<?php

namespace App\Providers;

use App\Services\GeocodeApi;
use Illuminate\Support\ServiceProvider;

class GeocodeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Geocode', function ($app) {
            return new GeocodeApi(env('GEOCODE_TOKEN'), env('GEOCODE_LANG'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
