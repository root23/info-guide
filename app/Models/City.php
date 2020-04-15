<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Taxi;

class City extends Model
{
    protected $appends = [
        'taxiCount',
    ];

    public function getTaxiCountAttribute() {
        $count = Taxi::where('city_id', $this->id)->count();
        return $count;
    }
}
