<?php

namespace App\Http\Controllers\Taxi;

use App\Http\Controllers\Blog\BaseController;
use App\Models\City;
use Illuminate\Http\Request;
use App\Repositories\TaxiCityRepository;
use Illuminate\Support\Facades\DB;

class CityController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * @var TaxiCityRepository
     */
    private $taxiCityRepository;

    public function __construct() {
        parent::__construct();

        $this->taxiCityRepository = app(TaxiCityRepository::class);
    }

    public function index()
    {
        $paginator = $this->taxiCityRepository->getAllWithPaginate();
        return view('taxi.cities.index')
            ->with('paginator', $paginator);

//        $cities = City::all();
//        return view('taxi.cities.index')
//            ->with('cities', $cities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $city = City::where('slug', $slug)->first();
        return view('taxi.cities.detail')
            ->with('city', $city);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request) {
        if ($request->ajax()) {

            $query = $request->get('query');
            $paginator = $this->taxiCityRepository->getSearchCities($query);
            return view('taxi.cities.includes.loaded')
                ->with('paginator', $paginator)->render();
        }
    }
}
