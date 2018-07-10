<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PlaceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Places\PlaceRepository::class,
            \App\Repositories\Places\DbPlaceRepository::class
        );
    }
}
