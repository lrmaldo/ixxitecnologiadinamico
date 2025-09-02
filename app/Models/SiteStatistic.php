<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SiteStatistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'page',
        'route_name',
        'visits',
        'user_agent',
        'ip',
        'referer',
        'meta_data'
    ];

    protected $casts = [
        'date' => 'date',
        'meta_data' => 'array',
    ];

    /**
     * Registrar una nueva visita
     *
     * @param string|null $page
     * @param string|null $routeName
     * @param array $metaData
     * @return SiteStatistic
     */
    public static function recordVisit($page = null, $routeName = null, $metaData = [])
    {
        $today = Carbon::today()->toDateString();
        $request = request();

        // Obtener o crear el registro de estadísticas para hoy y esta página
        $stat = self::firstOrNew([
            'date' => $today,
            'page' => $page ?: $request->path(),
            'route_name' => $routeName ?: ($request->route() ? $request->route()->getName() : null),
        ]);

        // Incrementar visitas
        $stat->visits = ($stat->visits ?? 0) + 1;

        // Almacenar información adicional
        $stat->user_agent = $request->userAgent();
        $stat->ip = $request->ip();
        $stat->referer = $request->header('referer');
        $stat->meta_data = $metaData;

        $stat->save();

        return $stat;
    }

    /**
     * Obtener estadísticas diarias para los últimos n días
     *
     * @param int $days
     * @return array
     */
    public static function getDailyStats($days = 30)
    {
        $startDate = Carbon::today()->subDays($days);

        // Usar funciones compatibles con SQLite
        if (DB::connection()->getDriverName() === 'sqlite') {
            return self::select(
                DB::raw('date as day'),
                DB::raw('SUM(visits) as total_visits')
            )
            ->where('date', '>=', $startDate)
            ->groupBy('day')
            ->orderBy('day')
            ->get()
            ->map(function ($item) {
                return [
                    'day' => Carbon::parse($item->day)->format('d/m/Y'),
                    'visits' => $item->total_visits
                ];
            });
        } else {
            return self::select(
                DB::raw('DATE(date) as day'),
                DB::raw('SUM(visits) as total_visits')
            )
            ->where('date', '>=', $startDate)
            ->groupBy('day')
            ->orderBy('day')
            ->get()
            ->map(function ($item) {
                return [
                    'day' => Carbon::parse($item->day)->format('d/m/Y'),
                    'visits' => $item->total_visits
                ];
            });
        }
    }

    /**
     * Obtener estadísticas mensuales para los últimos n meses
     *
     * @param int $months
     * @return array
     */
    public static function getMonthlyStats($months = 12)
    {
        $startDate = Carbon::today()->startOfMonth()->subMonths($months);

        // Usar funciones compatibles con SQLite para extraer año y mes
        if (DB::connection()->getDriverName() === 'sqlite') {
            return self::select(
                DB::raw("strftime('%Y', date) as year"),
                DB::raw("strftime('%m', date) as month"),
                DB::raw('SUM(visits) as total_visits')
            )
            ->where('date', '>=', $startDate)
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get()
            ->map(function ($item) {
                $date = Carbon::createFromDate((int)$item->year, (int)$item->month, 1);
                return [
                    'month' => $date->format('M Y'),
                    'visits' => $item->total_visits
                ];
            });
        } else {
            return self::select(
                DB::raw('YEAR(date) as year'),
                DB::raw('MONTH(date) as month'),
                DB::raw('SUM(visits) as total_visits')
            )
            ->where('date', '>=', $startDate)
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get()
            ->map(function ($item) {
                $date = Carbon::createFromDate($item->year, $item->month, 1);
                return [
                    'month' => $date->format('M Y'),
                    'visits' => $item->total_visits
                ];
            });
        }
    }

    /**
     * Obtener las páginas más visitadas
     *
     * @param int $limit
     * @return array
     */
    public static function getTopPages($limit = 10)
    {
        return self::select(
            'page',
            DB::raw('SUM(visits) as total_visits')
        )
        ->groupBy('page')
        ->orderBy('total_visits', 'desc')
        ->limit($limit)
        ->get();
    }

    /**
     * Obtener estadísticas generales
     *
     * @return array
     */
    public static function getSummary()
    {
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();
        $thisMonth = Carbon::today()->startOfMonth();
        $lastMonth = Carbon::today()->subMonth()->startOfMonth();

        $todayVisits = self::where('date', $today)->sum('visits');
        $yesterdayVisits = self::where('date', $yesterday)->sum('visits');
        $thisMonthVisits = self::where('date', '>=', $thisMonth)->sum('visits');
        $lastMonthVisits = self::whereBetween('date', [$lastMonth, $lastMonth->copy()->endOfMonth()])->sum('visits');
        $totalVisits = self::sum('visits');

        $percentChange = 0;
        if ($yesterdayVisits > 0) {
            $percentChange = (($todayVisits - $yesterdayVisits) / $yesterdayVisits) * 100;
        }

        $monthPercentChange = 0;
        if ($lastMonthVisits > 0) {
            $monthPercentChange = (($thisMonthVisits - $lastMonthVisits) / $lastMonthVisits) * 100;
        }

        return [
            'today' => $todayVisits,
            'yesterday' => $yesterdayVisits,
            'percent_change' => round($percentChange, 1),
            'this_month' => $thisMonthVisits,
            'last_month' => $lastMonthVisits,
            'month_percent_change' => round($monthPercentChange, 1),
            'total' => $totalVisits,
        ];
    }
}
