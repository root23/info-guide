<?php

namespace App\Http\Controllers\Taxi\Admin;

use App\Http\Controllers\Blog\Admin\BaseController;
use App\Http\Requests\CityCreateRequest;
use App\Http\Requests\CityUpdateRequest;
use App\Models\City;
use App\Repositories\TaxiCityRepository;
use Illuminate\Http\Request;

class CityController extends BaseController
{

    /**
     * @var TaxiCityRepository
     */
    private $taxiCityRepository;

    public function __construct() {
        parent::__construct();

        $this->taxiCityRepository = app(TaxiCityRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->taxiCityRepository->getAllWithPaginate();
        return view('taxi.admin.cities.index', compact('paginator'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->taxiCityRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }

        return view('taxi.admin.cities.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityUpdateRequest $request, $id)
    {
        $item = $this->taxiCityRepository->getEdit($id);

        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('admin.cities.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new City();

        return view('taxi.admin.cities.edit', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityCreateRequest $request)
    {
        $data = $request->input();

        $item = (new City())->create($data);
        if ($item) {
            return redirect()->route('admin.cities.edit', [$item->id])
                ->with(['success' => "Успешно сохранено"]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }
}
