<?php

namespace App\Repositories;

use App\Models\OrganizationCategory as Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class OrganizationCategoryRepository.
 */
class OrganizationCategoryRepository extends CoreRepository {
    /**
     * @return mixed|string
     */
    public function getModelClass() {
        return Model::class;
    }

    /**
     * @param int $id
     * @return Model
     */
    public function getEdit($id) {
        return $this->startConditions()->find($id);
    }

    /**
     * @return Collection
     */
    public function getForComboBox() {
        $columns = implode(', ', [
            'id',
            'CONCAT (id, ".", title) AS id_title',
        ]);

        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

        return $result;
    }

    /**
     * Получить категории для вывода с пагинатором
     *
     * @param int|null $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginate($perPage = null) {
        $columns = ['id', 'title', 'parent_id'];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->paginate($perPage);

        return $result;
    }
}
