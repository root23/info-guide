<?php

namespace App\Http\Controllers\Organization\Admin;

use App\Http\Requests\OrganizationUpdateRequest;
use App\Http\Requests\OrganizationCreateRequest;
use App\Models\Organization;
use App\Repositories\OrganizationCategoryRepository;
use App\Repositories\OrganizationRepository;

/**
 * Class OrganizationController
 * Управление организациями
 * @package App\Http\Controllers\Blog\Admin
 */
class OrganizationController extends BaseController
{
    /**
     * @var OrganizationRepository
     */
    private $organizationRepository;

    /**
     * @var OrganizationCategoryRepository
     */
    private $organizationCategoryRepository;

    public function __construct() {
        parent::__construct();

        $this->organizationRepository = app(OrganizationRepository::class);
        $this->organizationCategoryRepository = app(OrganizationCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->organizationRepository->getAllWithPaginate();

        return view('organization.admin.organization.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Organization();
        $categoryList = $this->organizationCategoryRepository->getForComboBox();

        return view('organization.admin.organization.edit', compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrganizationCreateRequest $request)
    {
        $data = $request->input();

        $item = new Organization($data);
        $item->save();

        if ($item) {
            return redirect()->route('organization.admin.organization.edit', [$item->id])
                ->with(['success' => 'Организация успешно создана']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->organizationRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }

        $categoryList = $this->organizationCategoryRepository->getForComboBox();

        return view('organization.admin.organization.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrganizationUpdateRequest $request, $id)
    {
        $item = $this->organizationRepository->getEdit($id);

        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('organization.admin.organization.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd(__METHOD__, $id, request()->all());
    }
}
