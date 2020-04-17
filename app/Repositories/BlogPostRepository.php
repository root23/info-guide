<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;
//use Your Model

/**
 * Class BlogPostRepository.
 */
class BlogPostRepository extends CoreRepository
{
    protected function getModelClass() {
        return Model::class;
    }

    /**
     * Получить список статей для вывода в списке
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
            'img',
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
            'excert',
            'slug',
            'is_published',
            'published_at',
            'user_id',
            'category_id',
            'img'
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
}
