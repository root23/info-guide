<?php

namespace App\Http\Controllers\Organization\Admin;

use App\Http\Requests\OrganizationUpdateRequest;
use App\Http\Requests\OrganizationCreateRequest;
use App\Models\Organization;
use App\Repositories\OrganizationCategoryRepository;
use App\Repositories\OrganizationRepository;
use App\Repositories\TaxiCityRepository;

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

    /**
     * @var TaxiCityRepository
     */
    private $taxiCityRepository;

    public function __construct() {
        parent::__construct();

        $this->organizationRepository = app(OrganizationRepository::class);
        $this->organizationCategoryRepository = app(OrganizationCategoryRepository::class);
        $this->taxiCityRepository = app(TaxiCityRepository::class);
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
        $cityList = $this->taxiCityRepository->getForComboBox();

        return view('organization.admin.organization.edit', compact('item', 'categoryList', 'cityList'));
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

        // Organization image
        $fileName = time() . '.' . $request->file('img')->extension();
        $data['img'] = $fileName;
        $request->file('img')->move(public_path('uploads'), $fileName);

        $item = (new Organization())->create($data);
        if ($item) {
            return redirect()->route('organization.admin.organization.edit', [$item->id])
                ->with(['success' => "Успешно сохранено"])
                ->with(['img' => $fileName]);
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
        $cityList = $this->taxiCityRepository->getForComboBox();

        return view('organization.admin.organization.edit', compact('item', 'categoryList', 'cityList'));
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

        if ($request->hasFile('img')) {
            $fileName = time() . '.' . $request->file('img')->extension();
            $data['img'] = $fileName;
            $request->file('img')->move(public_path('uploads'), $fileName);
        } else {
            $data['img'] = $item->img;
        }

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
