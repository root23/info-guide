<?php

namespace App\Repositories;

use App\Models\Organization;
use App\Models\Organization as Model;

/**
 * Class OrganizationRepository.
 */
class OrganizationRepository extends CoreRepository
{
    protected function getModelClass() {
        return Model::class;
    }

    public function getOneOrganization($slug) {
        $columns = [
            'id',
            'title',
            'is_published',
            'published_at',
            'slug',
            'user_id',
            'category_id',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->where([
                'slug' => $slug,
                'is_published' => 1,
            ])
            ->with(['category',])
            ->get()->first();

        return $result;
    }

    /**
     * Получить список организаций для вывода в списке
     * Админ-панель
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginate() {
        $columns = [
            'id',
            'title',
            'slug',
            'is_published',
            'published_at',
            'user_id',
            'category_id',
        ];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->with(['category', 'user'])
            ->paginate(25);

        return $result;
    }

    /**
     * Получить модель для редактирования
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEdit($id) {
        return $this->startConditions()->find($id);
    }

    public function getAllForIndexPage() {
        $columns = [
            'id',
            'title',
            'slug',
            'is_published',
            'published_at',
            'user_id',
            'category_id',
        ];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->where('is_published', 1)
            ->orderBy('id', 'DESC')
            ->with(['category', 'user'])
            ->paginate(5);
        return $result;
    }

    public function getAllOrganizationsForCity($city_id, $category_id) {
        $organizations = Organization::where(['city_id' => $city_id, 'category_id' => $category_id])
            ->orderBy('id', 'ASC')
            ->paginate(10);
        return $organizations;
    }
}
