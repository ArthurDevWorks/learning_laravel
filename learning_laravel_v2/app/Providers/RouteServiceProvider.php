<?php

namespace App\Providers;

use Illuminate\Routing\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Verifica se o método resourceVerbs existe antes de chamar
        if (method_exists(Route::class, 'resourceVerbs')) {
            $this->configureVerbs();
        }
    }

    private function configureVerbs()
    {
        Route::resourceVerbs([
            'create' => 'inserir',
            'edit' => 'editar',
        ]);
    }
}
