<?php

namespace App\Http\Controllers\Util;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\Taxi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\SplFileInfo;

class SearchController extends Controller
{
    public function search(Request $request) {
        $results = Taxi::search('яндекс')->get();

        dd($results);
    }
}
