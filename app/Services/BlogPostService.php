<?php

namespace App\Services;

use App\Repositories\BlogPostRepository as Repository;

class BlogPostService extends CoreService {

    /**
     * @return mixed|string
     */
    protected function getRepositoryClass() {
        return Repository::class;
    }

    public function findById(int $id) {
        return $this->repository->getOnePostById($id);
    }

    public function findBySlug(string $slug) {

    }
}
