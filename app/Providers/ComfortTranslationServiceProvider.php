<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComfortTranslationServiceProvider extends ServiceProvider
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
            \App\Repositories\ComfortTranslations\ComfortTranslationRepository::class,
            \App\Repositories\ComfortTranslations\DbComfortTranslationRepository::class
        );
    }
}
