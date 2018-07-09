<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SocialAccountServiceProvider extends ServiceProvider
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
            \App\Repositories\SocialAccounts\SocialAccountRepository::class,
            \App\Repositories\SocialAccounts\DbSocialAccountRepository::class
        );
    }
}
