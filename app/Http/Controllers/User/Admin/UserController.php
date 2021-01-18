<?php

namespace App\Http\Controllers\User\Admin;

use App\Http\Controllers\Blog\Admin\BaseController;
use App\Repositories\UserRepository;

class UserController extends BaseController {

    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    public function __construct() {
        parent::__construct();

        $this->userRepository = app(UserRepository::class);
    }

    /**
     * Show all users
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $paginator = $this->userRepository->getAllWithPagination();
        return view('user.admin.index', compact('paginator'));
    }

    /**
     * Load specific user for editing
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id) {
        $user = $this->userRepository->getById($id);

        if (empty($user)) {
            abort(404);
        }

        return view('user.admin.edit', compact('user'));
    }
}
