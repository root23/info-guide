<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Blog\BaseController;
use App\Http\Requests\OrganizationReviewCreateRequest;
use App\Models\OrganizationReview;
use App\Repositories\OrganizationReviewRepository;
use Illuminate\Http\Request;

class OrganizationReviewController extends BaseController
{
    /**
     * @var OrganizationReviewRepository
     */
    private $reviewRepository;

    public function __construct() {
        parent::__construct();

        $this->reviewRepository = app(OrganizationReviewRepository::class);
    }

    /**
     * Добавление нового отзыва
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrganizationReviewCreateRequest $request)
    {
        $data = $request->input();
        $item = (new OrganizationReview())->create($data);

        if ($item) {
            return ['success' => "Успешно сохранено"];
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Поиск отзывов для организации
     *
     * @param Request $request
     * @return array|string
     * @throws \Throwable
     */
    public function search(Request $request) {
        if ($request->ajax()) {
            $organization_id = $request->get('organization_id');
            $reviews = $this->reviewRepository->getReviewsForOrganization($organization_id);
            return view('organization.reviews.organization-reviews', ['reviews' => $reviews])->render();
        }
    }

}
