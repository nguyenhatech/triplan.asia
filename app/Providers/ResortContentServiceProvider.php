<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ResortContentServiceProvider extends ServiceProvider
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
            \App\Repositories\ResortContents\ResortContentRepository::class,
            \App\Repositories\ResortContents\DbResortContentRepository::class
        );
    }
}
