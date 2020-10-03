<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Blog\BaseController;
use App\Models\City;
use App\Models\OrganizationCategory;
use App\Repositories\OrganizationRepository;

class OrganizationController extends BaseController
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($city_slug, $category_slug, $organization_id)
    {
        $organization = $this->organizationRepository->getOrganizationById($organization_id);
        $category = OrganizationCategory::where('slug', $category_slug)->first();
        $city = City::where('slug', $city_slug)->first();

        if (!$organization || !$category || !$city) {
            abort(404);
        }

        return view('organization.organization.detail')
            ->with('organization', $organization)
            ->with('category', $category)
            ->with('city', $city);
    }
}
