<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Blog\BaseController;
use App\Http\Controllers\Controller;
use App\Services\OrganizationImageService;
use Illuminate\Http\Request;

class OrganizationImageController extends BaseController
{
    private OrganizationImageService $organizationImageService;

    public function __construct() {
        parent::__construct();

        $this->organizationImageService = app(OrganizationImageService::class);
    }

    public function index() {
        return $this->organizationImageService->loadImagesFromFolders();
    }
}
