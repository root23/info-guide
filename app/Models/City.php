<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Taxi;

class City extends Model
{
    protected $fillable = ['name', 'name_for_display', 'description', 'updated_at', 'meta_description', 'meta_keywords', 'slug',];
    protected $appends = [
        'taxiCount',
    ];

    public function getTaxiCountAttribute() {
        $count = Taxi::where('city_id', $this->id)->count();
        return $count;
    }
}
