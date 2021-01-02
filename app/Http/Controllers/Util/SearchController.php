<?php

namespace App\Http\Controllers\Util;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\SplFileInfo;

class SearchController extends Controller
{
    public function search(Request $request) {
        $results = Organization::search('стоматология Москва')->get();

        dd($results);
    }
}
