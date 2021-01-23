<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Blog\BaseController;
use App\Jobs\OrganizationImageSync;
use Illuminate\Foundation\Bus\DispatchesJobs;

class OrganizationImageController extends BaseController
{
    use DispatchesJobs;
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $job = new OrganizationImageSync();
        $this->dispatch($job);
    }
}
