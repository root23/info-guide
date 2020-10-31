<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Blog\BaseController;
use App\Models\Organization;
use App\Models\City;
use App\Models\OrganizationCategory;
use Illuminate\Http\Request;
use App\Repositories\OrganizationRepository;
use Illuminate\Support\Facades\DB;

class OrganizationCategoryController extends BaseController
{

    /**
     * @var OrganizationRepository
     */
    private $organizationRepository;

    public function __construct() {
        parent::__construct();

        $this->organizationRepository = app(OrganizationRepository::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($city_slug, $category_slug)
    {
        $city = City::where('slug', $city_slug)->first();
        $category = OrganizationCategory::where('slug', $category_slug)->first();

        if (!$city || !$category || !$city->is_for_company) {
            abort(404);
        }

        $organizations = $this->organizationRepository->getAllOrganizationsForCity($city->id, $category->id);

        return view('organization.category.detail')
            ->with('city', $city)
            ->with('category', $category)
            ->with('organizations', $organizations);
    }

    /**
     *
     * @param Request $request
     * @return array|string
     * @throws \Throwable
     */
    public function search(Request $request) {
        if ($request->ajax()) {
            $query = $request->get('query');
            $paginator = $this->taxiCityRepository->getSearchCities($query);
            return view('taxi.cities.includes.loaded')
                ->with('paginator', $paginator)->render();
        }
    }

}
