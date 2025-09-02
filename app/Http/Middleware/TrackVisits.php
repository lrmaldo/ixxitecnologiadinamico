<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\SiteStatistic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class TrackVisits
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // No registramos visitas para recursos estáticos, API o solicitudes AJAX
        if ($this->shouldSkip($request)) {
            return $response;
        }

        // Usa la sesión o una cookie para evitar contar múltiples veces la misma visita
        $visitHash = md5($request->ip() . $request->path() . date('Y-m-d'));

        // Verificamos si ya contamos esta visita en la última hora
        if (!Cache::has("visit:{$visitHash}")) {
            // Registrar visita
            SiteStatistic::recordVisit(
                $request->path(),
                $request->route() ? $request->route()->getName() : null,
                [
                    'is_admin' => Auth::check() && Auth::user()->isAdmin(),
                    'is_authenticated' => Auth::check(),
                    'user_id' => Auth::check() ? Auth::id() : null,
                ]
            );

            // Incrementar contador global para mostrarlo en tiempo real
            Cache::increment('site_visits');

            // Guardar en caché para evitar múltiples conteos (por 1 hora)
            Cache::put("visit:{$visitHash}", true, now()->addHour());
        }

        return $response;
    }

    /**
     * Determinar si debemos omitir el seguimiento para esta solicitud
     *
     * @param  \Illuminate\Http\Request  $request
     * @return boolean
     */
    protected function shouldSkip(Request $request)
    {
        // No registrar solicitudes a archivos estáticos
        $path = $request->path();
        if (preg_match('/\.(css|js|jpg|jpeg|png|gif|ico|svg|woff|woff2|ttf|eot|map)$/', $path)) {
            return true;
        }

        // No registrar solicitudes AJAX
        if ($request->ajax()) {
            return true;
        }

        // No registrar solicitudes a la API
        if (Str::startsWith($path, 'api/')) {
            return true;
        }

        // No registrar bots o rastreadores
        $userAgent = strtolower($request->userAgent() ?? '');
        $botPatterns = [
            'googlebot', 'bingbot', 'slurp', 'duckduckbot', 'baiduspider',
            'yandexbot', 'sogou', 'exabot', 'facebookexternalhit', 'ia_archiver',
        ];

        foreach ($botPatterns as $botPattern) {
            if (Str::contains($userAgent, $botPattern)) {
                return true;
            }
        }

        return false;
    }
}
