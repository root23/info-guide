<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Spatie\Sitemap\SitemapGenerator;

class SitemapController extends Controller
{
    public function sitemap() {
        $pages = City::get();
        dd($pages);
    }
}
