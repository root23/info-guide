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
    protected function getModelClass() {
        return Model::class;
    }

    /**
     * Получить список городов для вывода.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginate() {
        $columns = [
            'id',
            'name',
            'slug',
            'name_for_display',
        ];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderBy('id', 'ASC')
            ->paginate(52);

        return $result;
    }

    /**
     * Метод для живого поиска.
     *
     * @param string $query
     */
    public function getSearchCities($query) {
        $columns = [
            'id',
            'name',
            'slug',
            'name_for_display',
        ];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->where('name', 'LIKE', '%'.$query.'%')
            ->paginate(52);

        return $result;
    }

    /**
     * Получить модель для редактирования
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
//    public function getEdit($id) {
//        return $this->startConditions()->find($id);
//    }
}
