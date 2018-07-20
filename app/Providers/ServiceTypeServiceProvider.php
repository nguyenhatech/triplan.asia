<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ServiceTypeServiceProvider extends ServiceProvider
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
            \App\Repositories\ServiceTypes\ServiceTypeRepository::class,
            \App\Repositories\ServiceTypes\DbServiceTypeRepository::class
        );
    }
}
