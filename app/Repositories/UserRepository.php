<?php

namespace App\Repositories;

//use Your Model
use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRepository.
 */
class UserRepository extends CoreRepository {
    protected function getModelClass() {
        return Model::class;
    }

    public function getUserById(int $id): User {
        $user = \DB::table('users')
            ->where('id', $id)
            ->first()
            ->get();
    }

    public function getAllWithPagination(int $perPage = 40) {
        $users = \DB::table('users')
            ->orderBy('id', 'ASC')
            ->paginate($perPage);
    }
}
