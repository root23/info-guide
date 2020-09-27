<?php

namespace App\Providers;

use App\Models\City;
use App\Models\Review;
use App\Models\Taxi;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class SiteStatsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->get_stats();
    }

    public function get_stats() {
        View::composer(['taxi.cities.includes.right-col-default', 'organization.category.includes.right-col-default'], function($view) {
            $cites_count = City::count();
            $taxis_count = Taxi::count();
            $reviews_count = Review::count();
            $view->with('cities_count', $cites_count)
                ->with('taxis_count', $taxis_count)
                ->with('reviews_count', $reviews_count);
        });
    }
}
