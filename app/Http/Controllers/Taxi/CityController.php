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
     *
     */
    public function showCities() {
        $paginator = $this->taxiCityRepository->getAllCitiesWithCompaniesPaginated();
        return view('cities.index')
            ->with('paginator', $paginator);
    }

    /**
     * Детальная информация о городе (для компаний)
     *
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCity($slug) {
        $city = City::where('slug', $slug)
            ->where('is_for_company', true)
            ->first();

        return view('');
    }

    /**
     * @param Request $request
     * @return array|string
     * @throws \Throwable
     */
    public function search(Request $request) {
        if ($request->ajax()) {
            $query = $request->get('query');
            $is_for_company = $request->get('is_for_company');
            $paginator = $this->taxiCityRepository->getSearchCities($query, $is_for_company);

            $view = $is_for_company ? 'cities.includes.loaded' : 'taxi.cities.includes.loaded';

            return view($view)
                ->with('paginator', $paginator)->render();
        }
    }

}
