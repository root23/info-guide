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
}
