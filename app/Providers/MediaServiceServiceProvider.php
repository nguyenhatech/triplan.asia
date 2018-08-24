<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MediaServiceServiceProvider extends ServiceProvider
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
            \App\Repositories\MediaServices\MediaServiceRepository::class,
            \App\Repositories\MediaServices\DbMediaServiceRepository::class
        );
    }
}
