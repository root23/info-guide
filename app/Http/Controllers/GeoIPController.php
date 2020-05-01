<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Blog\BaseController;
use App\Repositories\TaxiCityRepository;

class GeoIPController extends BaseController
{
    /**
     * @var TaxiCityRepository
     */
    private $taxiCityRepository;

    public function __construct() {
        parent::__construct();
        $this->taxiCityRepository = app(TaxiCityRepository::class);
    }

    public function get_location() {
        $loc = geoip()->getLocation(geoip()->getClientIP());

        $city = $this->taxiCityRepository->searchCityFromGeoIP($loc->city);

        return !empty($city) ? $city : null;
    }
}
