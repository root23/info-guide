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

    public function getOnePostById(int $id) {
        $result = $this->startConditions()
            ->select('*');
    }

    public function getOnePost($slug) {
        $columns = [
            'id',
            'title',
            'content_html',
            'is_published',
            'published_at',
            'img',
            'deleted_at',
            'meta_description',
            'meta_keywords',
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

    public function getLatestPosts($limit = 3) {
        $result = $this->startConditions()
            ->orderBy('id', 'DESC')
            ->limit(3)
            ->get();
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
            'img',
            'view_count',
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
