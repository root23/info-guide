<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    protected $table = 'clinics';

    public function info() {
        return $this->hasOne('App\ClinicInfo', 'id_clinic', 'id');
    }

    public function phones() {
        return $this->hasMany('App\ClinicPhone', 'id_clinic', 'id');
    }
}
