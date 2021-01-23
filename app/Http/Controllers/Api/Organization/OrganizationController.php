<?php

namespace App\Http\Controllers\Api\Organization;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\City;
use App\Models\Organization;
use App\Models\OrganizationCategory;
use App\Repositories\OrganizationImageRepository;
use App\Repositories\OrganizationRepository;
use Illuminate\Http\Request;

class OrganizationController extends BaseController
{
    /**
     * @var OrganizationRepository $organizationRepository
     */
    private OrganizationRepository $organizationRepository;

    /**
     * @var OrganizationImageRepository $imageRepository
     */
    private OrganizationImageRepository $imageRepository;

    /**
     * OrganizationController constructor.
     */
    public function __construct() {
        $this->organizationRepository = app(OrganizationRepository::class);
        $this->imageRepository = app(OrganizationImageRepository::class);
    }

    public function show(int $id) {
        $organization = $this->organizationRepository->getOrganizationById($id);

        if (is_null($organization)) {
            return $this->sendError('Organization not found.');
        }

        return $this->sendResponse($organization->toArray(), 'Organization retrieved successfully.');

    }
}
