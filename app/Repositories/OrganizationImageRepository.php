<?php

namespace App\Repositories;

use App\Models\OrganizationImage as Model;

/**
 * Class OrganizationImageRepository
 * @package App\Repositories
 */
class OrganizationImageRepository extends CoreRepository
{
    protected function getModelClass() {
        return Model::class;
    }

    public function getOrganizationImages(int $organization_id) {
        $result = $this->startConditions()
            ->select('*')
            ->where('organization_id', $organization_id)
            ->get();
    }
}
