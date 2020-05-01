<?php

namespace App\Providers;

use App\Models\City;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class UserGeoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()  {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()  {
        $this->geo_tool();
    }

    public function geo_tool() {
        View::composer('layouts.app', function($view){
            $loc = geoip()->getLocation(geoip()->getClientIP());
            $geo_city = City::where('name', $loc->city)->first();
            $view->with('geo_city', $geo_city);
        });
    }
}
