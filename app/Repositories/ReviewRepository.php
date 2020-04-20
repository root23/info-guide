<?php

namespace App\Repositories;

use App\Models\Review as Model;


/**
 * Class ReviewRepository.
 */
class ReviewRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getReviewsForTaxi($taxi_id) {
        $columns = [
            'id',
            'name',
            'email',
            'message',
            'taxi_id',
            'created_at',
        ];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderBy('created_at', 'DESC')
            ->where('taxi_id', $taxi_id)
            ->paginate(5);

        return $result;
    }
}
