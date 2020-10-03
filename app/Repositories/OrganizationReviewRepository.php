<?php

namespace App\Repositories;

use App\Models\OrganizationReview as Model;


/**
 * Class OrganizationReviewRepository.
 */
class OrganizationReviewRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getReviewsForOrganization($organization_id) {
        $columns = [
            'id',
            'name',
            'email',
            'message',
            'organization_id',
            'created_at',
            'rating',
        ];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderBy('created_at', 'DESC')
            ->where('organization_id', $organization_id)->get();

        return $result;
    }
}
