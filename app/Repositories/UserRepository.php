<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class UserRepository.
 */
class UserRepository extends CoreRepository {
    protected function getModelClass() {
        return Model::class;
    }

    public function getUserById(int $id) {
        $user = DB::table('users')
            ->where('id', $id)
            ->first();

        return $user;
    }

    public function getAllWithPagination(int $perPage = 40) {
        $users = DB::table('users')
            ->orderBy('id', 'ASC')
            ->paginate($perPage);

        return $users;
    }
}
