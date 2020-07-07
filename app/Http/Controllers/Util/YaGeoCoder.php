<?php

namespace App\Http\Controllers\Util;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class YaGeoCoder extends Controller
{
    public function get_city(Request $request) {
        $pointA = $request['pointA'];
        $pointB = $request['pointB'];

        $q = 'https://geocode-maps.yandex.ru/1.x/?lang=ru_RU&apikey=' . env('YANDEX_MAPS_KEY') . '&geocode=' . $pointA . '&format=json';
        $response = Http::get($q);
        if ($response->successful()) {
            $point_a = $response->json()['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['Point']['pos'];
        } else {
            return $response->status();
        }

        $q = 'https://geocode-maps.yandex.ru/1.x/?lang=ru_RU&apikey=' . env('YANDEX_MAPS_KEY') . '&geocode=' . $pointB . '&format=json';
        $response = Http::get($q);
        if ($response->successful()) {
            $point_b = $response->json()['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['Point']['pos'];
        } else {
            return $response->status();
        }


        $point_a = str_replace(' ', ',', $point_a);
        $point_b = str_replace(' ', ',', $point_b);

        $q = 'https://taxi-routeinfo.taxi.yandex.net/taxi_info?rll=' . $point_a . '~' . $point_b . '&clid=info-guide&class=econom,business,comfortplus,minivan,vip';
        $response = Http::withHeaders([
            'YaTaxi-Api-Key' => env('YANDEX_TAXI_KEY'),
        ])
        ->get($q);

        return $response->json()['options'];
    }
}
