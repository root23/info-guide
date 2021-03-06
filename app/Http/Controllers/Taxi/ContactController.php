<?php

namespace App\Http\Controllers\Taxi;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaxiContactCreateRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('taxi.contacts.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TaxiContactCreateRequest $request)
    {
        $data = $request->input();
        $item = (new Contact())->create($data);

        if ($item) {
            return redirect()->route('contacts.index', [$item->id])
                ->with(['success' => "Ваше сообщение было успешно отправлено!"]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка отправки сообщения!'])
                ->withInput();
        }
    }

    public function about() {
        return view('taxi.contacts.about');
    }
}
