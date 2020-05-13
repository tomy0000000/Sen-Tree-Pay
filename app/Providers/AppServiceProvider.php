<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $protocol = Str::startsWith(config('app.url'), 'https://') ? 'https' : 'http';
        // URL::forceScheme($protocol);

        // URL::forceScheme('https');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        // if (env('APP_ENV') === 'production') {
        //     $this->app['url']->forceScheme('https');
        // }
    }
}
