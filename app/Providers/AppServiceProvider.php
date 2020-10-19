<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        if (request()->isSecure()) {
            \URL::forceScheme('https');
        }

        $is_production = env('APP_ENV') === 'production' ? true : false;
        View::share('is_production',$is_production);
    }
}
