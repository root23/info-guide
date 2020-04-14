<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Http\Requests\BlogCategoryCreateRequest;
use App\Models\BlogCategory;
use App\Repositories\BlogCategoryRepository;
use Gate;

/**
 * Управление категориями блога
 * Class CategoryController
 * @package App\Http\Controllers\Blog\Admin
 */
class CategoryController extends BaseController
{
    /**
     * @var BlogCategoryRepository
     */
    private $blogCategoryRepository;

    public function __construct() {
        parent::__construct();
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index() {
//        $paginator = BlogCategory::paginate(10);
        $paginator = $this->blogCategoryRepository->getAllWithPaginate(5);
        return view('blog.admin.category.index', compact('paginator'));
    }

    public function create()
    {
        $item = new BlogCategory();
        $categoryList = $this->blogCategoryRepository->getForComboBox();

        return view('blog.admin.category.edit', ['categoryList' => $categoryList, 'item' => $item]);
    }

    public function store(BlogCategoryCreateRequest $request) {
        $data = $request->input();

        $item = new BlogCategory($data);
        $item->save();

        if ($item) {
            return redirect()->route('blog.admin.categories.edit', [$item->id])
                ->with(['success' => 'Категория успешно создана']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    public function show($id)
    {
        dd(__METHOD__);
    }

    /**
     * @param int $id
     * @param BlogCategoryRepository $categoryRepository
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->blogCategoryRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }
        $categoryList = $this->blogCategoryRepository->getForComboBox($item->parent_id);

        return view('blog.admin.category.edit',
        compact('item', 'categoryList'));
    }

    public function update(BlogCategoryUpdateRequest $request, $id) {
        $item = BlogCategory::find($id);
        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();
//        if (empty($data['slug'])) {
//            $data['slug'] = Str::slug($data['title']);
//        }

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('blog.admin.categories.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => "Ошибка при сохранении"])
                ->withInput();
        }
    }

    public function destroy($id)
    {
        dd(__METHOD__);
    }
}
