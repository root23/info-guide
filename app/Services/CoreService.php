<?php

namespace App\Services;

abstract class CoreService {
    /**
     * @var
     */
    protected $repository;

    /**
     * CoreService constructor.
     */
    public function __construct() {
        $this->repository = app($this->getRepositoryClass());
    }

    public function all() {
        return $this->repository->all();
    }

    public function paginated() {
        return $this->repository->paginate();
    }

    public function create(array $input) {

    }

    /**
     * @return mixed
     */
    abstract protected function getRepositoryClass();

    /**
     * @param int $id
     * @return mixed
     */
    abstract public function findById(int $id);

    /**
     * @param string $slug
     * @return mixed
     */
    abstract public function findBySlug(string $slug);
}
