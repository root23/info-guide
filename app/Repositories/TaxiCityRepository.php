<?php

namespace App\Repositories;

use App\Models\Taxi;
use App\Models\City as Model;
//use Your Model

/**
 * Class TaxiCityRepository.
 */
class TaxiCityRepository extends CoreRepository
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
     * Получить список городов для вывода.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll() {
        $columns = [
            'id',
            'name',
        ];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderBy('id', 'ASC')
            ->get();

        return $result;
    }

    /**
     * Получить список городов, в которых есть организации
     * Для страницы /cities/
     *
     */
    public function getAllCitiesWithCompaniesPaginated() {
        $columns = [
            'id',
            'name',
            'is_for_company',
            'slug',
            'name_for_display'
        ];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->where('is_for_company', true)
            ->orderBy('id', 'ASC')
            ->paginate(52);

        return $result;
    }

    /**
     * Метод для живого поиска.
     *
     * @param string $query
     */
    public function getSearchCities($query, $is_for_company=false) {
        $columns = [
            'id',
            'name',
            'slug',
            'name_for_display',
            'is_for_company',
        ];
        if ($is_for_company) {
            $result = $this
                ->startConditions()
                ->select($columns)
                ->where('name', 'LIKE', '%'.$query.'%')
                ->where('is_for_company', $is_for_company)
                ->paginate(52);
        } else {
            $result = $this
                ->startConditions()
                ->select($columns)
                ->where('name', 'LIKE', '%'.$query.'%')
                ->paginate(52);
        }

        return $result;
    }

    public function getAllTaxisForCity($id) {
        $taxis = Taxi::where('city_id', $id)
            ->orderBy('id', 'ASC')
            ->paginate(10);
        return $taxis;
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

    /**
     * @return Collection
     */
    public function getForComboBox() {
        $columns = implode(', ', [
            'id',
            'name AS title',
            'CONCAT (id, ".", name) AS id_title',
        ]);

        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

        return $result;
    }

}
