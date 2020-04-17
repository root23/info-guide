<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Sitemap\SitemapGenerator;

class SitemapController extends Controller
{
    public function sitemap() {
        SitemapGenerator::create('https://info-guide.ru')->writeToFile('/storage/s.xml');
    }
}
