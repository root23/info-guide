<?php

namespace App\Services;

use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository as Repository;

class UserService {

    private Repository $userRepository;

    public function __construct() {
        $this->userRepository = app(Repository::class);
    }

    private function getRepositoryClass() {
        return Repository::class;
    }

    public function create() {

    }

    public function update(UserUpdateRequest $request, int $user_id) {
        $user = $this->userRepository->getById($user_id);
        $data = $request->all();

        if (empty($user)) {
            return back()
                ->withErrors(['msg' => "Пользователь с id=[{$user_id}] не найден"])
                ->withInput();
        }

        $result = $user->update($data);
        $user->setRole($data['role_id']);
        $user->save();

        return $result;
    }

    public function delete() {

    }
}
