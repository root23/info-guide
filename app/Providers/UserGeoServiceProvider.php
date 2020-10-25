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
        View::composer(['layouts.app', 'main'], function($view) {
            $city_id_cookie = request()->cookie('user_city_id');
            if (!$city_id_cookie) {
                $loc = geoip()->getLocation(geoip()->getClientIP());
                $geo_city = City::where('name', $loc->city)
                    ->where('is_for_company', true)
                    ->first();
            } else {
                $geo_city = City::where('name', $city_id_cookie)
                    ->where('is_for_company', true)
                    ->first();
            }
            if (!$geo_city) {
                $geo_city = new City();
                $geo_city->name = 'Не определен';
            }

            $view->with('geo_city', $geo_city);
        });
    }
}
