<?php

namespace App\Http\Controllers\Taxi;

use App\Http\Controllers\Blog\BaseController;
use App\Http\Requests\ReviewCreateRequest;
use App\Models\Review;
use App\Repositories\ReviewRepository;
use Illuminate\Http\Request;

class ReviewController extends BaseController
{
    /**
     * @var TaxiCityRepository
     */
    private $reviewRepository;

    public function __construct() {
        parent::__construct();

        $this->reviewRepository = app(ReviewRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewCreateRequest $request)
    {
        $data = $request->input();
        $item = (new Review())->create($data);

        if ($item) {
            return ['success' => "Успешно сохранено"];
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * @param Request $request
     * @return array|string
     * @throws \Throwable
     */
    public function search(Request $request) {
        if ($request->ajax()) {
            $taxi_id = $request->get('taxi_id');
            $reviews = $this->reviewRepository->getReviewsForTaxi($taxi_id);
            return view('taxi.reviews.taxi-reviews', ['reviews' => $reviews])->render();
        }
    }

}
