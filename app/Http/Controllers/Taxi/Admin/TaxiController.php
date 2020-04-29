<?php

namespace App\Http\Controllers\Taxi\Admin;

use App\Http\Controllers\Blog\Admin\BaseController;
use App\Http\Requests\TaxiCreateRequest;
use App\Http\Requests\TaxiUpdateRequest;
use App\Models\Taxi;
use App\Repositories\TaxiCityRepository;
use App\Repositories\TaxiRepository;

class TaxiController extends BaseController
{
    /**
     * @var TaxiRepository
     */
    private $taxiRepository;
    /**
     * @var TaxiCityRepository
     */
    private $taxiCityRepository;

    public function __construct() {
        parent::__construct();

        $this->taxiRepository = app(TaxiRepository::class);
        $this->taxiCityRepository = app(TaxiCityRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->taxiRepository->getAllWithPaginate();
        return view('taxi.admin.taxis.index', compact('paginator'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->taxiRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }

        return view('taxi.admin.taxis.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaxiUpdateRequest $request, $id)
    {
        $item = $this->taxiRepository->getEdit($id);

        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('admin.taxis.edit', $item->id)
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
        $item = new Taxi();

        return view('taxi.admin.taxis.edit', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaxiCreateRequest $request)
    {
        $data = $request->input();

        $item = (new Taxi())->create($data);
        if ($item) {
            return redirect()->route('admin.taxis.edit', [$item->id])
                ->with(['success' => "Успешно сохранено"]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }
}
