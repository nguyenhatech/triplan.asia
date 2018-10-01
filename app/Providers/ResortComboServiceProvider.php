<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ResortComboServiceProvider extends ServiceProvider
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
            \App\Repositories\ResortCombos\ResortComboRepository::class,
            \App\Repositories\ResortCombos\DbResortComboRepository::class
        );
    }
}
