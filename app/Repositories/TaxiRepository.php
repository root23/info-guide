<?php

namespace App\Repositories;

use App\Models\City;
use App\Models\Taxi as Model;

//use Your Model

/**
 * Class TaxiRepository.
 */
class TaxiRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getTaxi($id) {
        $columns = [
            'id',
            'title',
            'phone_number',
            'description',
            'city_id',
            'mark_x',
            'mark_y',
        ];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->where('id', $id)
            ->get()->first();

        return $result;
    }

    public function getCityNameForDisplay($city_id) {
        return City::where('id', $city_id)->get()->first()->name_for_display;
    }

    public function getCity($city_id) {
        return City::where('id', $city_id)->get()->first();
    }

    /**
     * Получить список городов для вывода.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginate() {
        $columns = [
            'id',
            'title',
            'updated_at',
        ];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderBy('id', 'ASC')
            ->paginate(40);

        return $result;
    }

    /**
     * Получить модель для редактирования
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEdit($id) {
        return $this->startConditions()->find($id);
    }
}
