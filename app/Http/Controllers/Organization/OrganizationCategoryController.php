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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * @var OrganizationRepository
     */
    private $organizationRepository;

    public function __construct() {
        parent::__construct();

        $this->organizationRepository = app(OrganizationRepository::class);
    }

    public function index()
    {

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
    public function show($city_slug, $category_slug)
    {
        $city = City::where('slug', $city_slug)->first();
        $category = OrganizationCategory::where('slug', $category_slug)->first();

        if (!$city || !$category) {
            abort(404);
        }

        $organizations = $this->organizationRepository->getAllOrganizationsForCity($city->id, $category->id);

        return view('organization.category.detail')
            ->with('city', $city)
            ->with('category', $category)
            ->with('organizations', $organizations);
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
