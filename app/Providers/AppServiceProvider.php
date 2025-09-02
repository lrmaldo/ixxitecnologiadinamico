<?php

namespace App\Providers;

use App\Models\ContactInformation;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Definir permisos admin
        Gate::define('admin', fn($user) => $user && method_exists($user, 'isAdmin') && $user->isAdmin());

        // Registrar componentes personalizados
        $this->registerCustomComponents();

        // Compartir información de contacto con todas las vistas
        View::composer('*', function ($view) {
            $view->with('contactInfo', ContactInformation::getDefault());
        });
    }

    /**
     * Register custom components
     */
    private function registerCustomComponents(): void
    {
        // Registrar el componente flux:icon personalizado para line-chart
        Blade::component('components.flux.icon.line-chart', 'flux::icon.line-chart');
    }
}
