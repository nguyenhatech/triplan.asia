<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BannerServiceProvider extends ServiceProvider
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
            \App\Repositories\Banners\BannerRepository::class,
            \App\Repositories\Banners\DbBannerRepository::class
        );
    }
}
