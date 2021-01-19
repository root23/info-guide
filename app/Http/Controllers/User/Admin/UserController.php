<?php

namespace App\Http\Controllers\User\Admin;

use App\Http\Controllers\Blog\Admin\BaseController;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use DB;
use App\User;
use App\Services\UserService;

class UserController extends BaseController {

    /**
     * @var UserRepository $userRepository
     */
    private UserRepository $userRepository;

    /**
     * @var UserService $userService
     */
    private UserService $userService;

    public function __construct() {
        parent::__construct();

        $this->userRepository = app(UserRepository::class);
        $this->userService = app(UserService::class);
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

        $roleList = DB::table('roles')->get();
        return view('user.admin.edit', compact(['user', 'roleList']));
    }

    /**
     * @param UserUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserUpdateRequest $request, int $id) {
        $user = $this->userRepository->getById($id);
        $result = $this->userService->update($request, $id);

        if ($result) {
            return redirect()
                ->route('admin.users.edit', $user->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return redirect()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }
}
