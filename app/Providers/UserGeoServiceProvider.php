<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\GeoIPController as geo_controller;

class UserGeoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view) {
            $geoTool = new geo_controller();
            $geo_city = $geoTool->get_location();
            return $view->with('geo_city', $geo_city);
        });
    }
}
