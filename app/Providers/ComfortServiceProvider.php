<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComfortServiceProvider extends ServiceProvider
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
            \App\Repositories\Comforts\ComfortRepository::class,
            \App\Repositories\Comforts\DbComfortRepository::class
        );
    }
}
