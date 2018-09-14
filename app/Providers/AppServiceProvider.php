<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('APP_ENV', 'local') == 'production') {
            \URL::forceScheme('https');
        }
        // \URL::forceScheme('https');
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\KRepository\KRepositoryServiceProvider::class);
        if (!empty(config('kproviders'))) {
            foreach (config('kproviders') as $provider )
            {
                $this->app->register( $provider );
            }
        }
    }
}
