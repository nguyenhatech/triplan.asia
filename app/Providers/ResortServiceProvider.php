<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ResortServiceProvider extends ServiceProvider
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
            \App\Repositories\Resorts\ResortRepository::class,
            \App\Repositories\Resorts\DbResortRepository::class
        );
    }
}
