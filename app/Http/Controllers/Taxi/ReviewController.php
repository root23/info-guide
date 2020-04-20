<?php

namespace App\Http\Controllers\Taxi;

use App\Http\Controllers\Blog\BaseController;
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
    public function store(Request $request)
    {
        // TODO:
        // Обработка запроса
        $item = new Review();
        dd($request);
//        $categoryList = $this->reviewRepository->getForComboBox();

        //return view('blog.admin.posts.edit', compact('item', 'categoryList'));
    }

    /**
     * @param Request $request
     * @return array|string
     * @throws \Throwable
     */
    public function search(Request $request) {
        if ($request->ajax()) {
            $taxi_id = $request->get('taxi_id');
            $paginator = $this->reviewRepository->getReviewsForTaxi($taxi_id);
            return view('taxi.reviews.taxi-reviews')
                ->with('paginator', $paginator)->render();
        }
    }

}
