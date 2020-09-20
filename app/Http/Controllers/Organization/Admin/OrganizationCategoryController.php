<?php

namespace App\Http\Controllers\Organization\Admin;

use App\Http\Requests\OrganizationCategoryCreateRequest;
use App\Http\Requests\OrganizationCategoryUpdateRequest;
use App\Models\OrganizationCategory;
use App\Repositories\OrganizationCategoryRepository;

/**
 * Управление категориями блога
 * Class OrganizationCategoryController
 * @package App\Http\Controllers\Organization\Admin
 */
class OrganizationCategoryController extends BaseController
{
    /**
     * @var OrganizationCategoryRepository
     */
    private $organizationCategoryRepository;

    public function __construct() {
        parent::__construct();
        $this->organizationCategoryRepository = app(OrganizationCategoryRepository::class);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $paginator = $this->organizationCategoryRepository->getAllWithPaginate(5);
        return view('organization.admin.category.index', compact('paginator'));
    }

    public function create()
    {
        $item = new OrganizationCategory();
        $categoryList = $this->organizationCategoryRepository->getForComboBox();

        return view('organization.admin.category.edit', ['categoryList' => $categoryList, 'item' => $item]);
    }

    public function store(OrganizationCategoryCreateRequest $request) {
        $data = $request->input();

        $item = new OrganizationCategory($data);
        $item->save();

        if ($item) {
            return redirect()->route('organization.admin.categories.edit', [$item->id])
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
     * @param OrganizationCategoryRepository $organizationCategoryRepository
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->organizationCategoryRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }
        $categoryList = $this->organizationCategoryRepository->getForComboBox($item->parent_id);

        return view('organization.admin.category.edit',
            compact('item', 'categoryList'));
    }

    public function update(OrganizationCategoryUpdateRequest $request, $id) {
        $item = OrganizationCategory::find($id);
        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('organization.admin.categories.edit', $item->id)
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
