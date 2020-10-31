<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\City;
use App\Models\Organization;
use App\Models\Taxi;

class SitemapController extends Controller
{
    public function sitemap() {
        $blog_posts = BlogPost::select('*')->orderBy('updated_at', 'desc')->first();
        $taxi = Taxi::select('*')->orderBy('updated_at', 'desc')->first();
        $organization = Organization::select('updated_at')->orderBy('updated_at', 'desc')->first();
        return response()->view('sitemap', compact(['blog_posts', 'taxi', 'organization']))
            ->header('Content-Type', 'text/xml');
    }

    public function main() {
        return response()->view('sitemaps.main')
            ->header('Content-Type', 'text/xml');
    }

    public function cities() {
        $cities = City::select('slug', 'updated_at')->orderBy('updated_at', 'desc')->get();
        return response()->view('sitemaps.cities', compact('cities'))
            ->header('Content-Type', 'text/xml');
    }

    public function posts() {
        $posts = BlogPost::select('slug', 'updated_at')->orderBy('updated_at', 'desc')->get();
        return response()->view('sitemaps.posts', compact('posts'))
            ->header('Content-Type', 'text/xml');
    }

    public function taxis($i) {
        $taxis = Taxi::select('id', 'updated_at')->orderBy('updated_at', 'desc')
            ->offset($i * 1000)->limit(1000)
            ->get();
        return response()->view('sitemaps.taxis', compact('taxis'))
            ->header('Content-Type', 'text/xml');
    }

    public function cityOrganizations($i) {
        $organizations = Organization::select('slug', 'updated_at', 'category_id', 'city_id')->orderBy('updated_at', 'desc')
            ->offset($i * 1000)->limit(1000)
            ->get();
        return response()->view('sitemaps.organizations', compact('organizations'))
            ->header('Content-Type', 'text/xml');
    }
}
