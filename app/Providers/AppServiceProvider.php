<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator; //Llamamos a la clase Paginator.
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap(); //Usamos el paginador de Bootstrap.
    }
}
