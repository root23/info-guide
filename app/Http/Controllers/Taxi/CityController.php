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
        $taxis = $this->taxiCityRepository->getAllTaxisForCity($city->id);
        return view('taxi.cities.detail')
            ->with('city', $city)
            ->with('taxis', $taxis);
    }

    /**
     * Вывод списка городов (для компаний)
     * @param string $slug
     *
     */
    public function showCities($slug) {
        $cities = $this->taxiCityRepository->getAllCitiesWithCompaniesPaginated();

        // TODO:
        // return view
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
