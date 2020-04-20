<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['name','email','message','taxi_id'];

    public function taxi() {
        return $this->belongsTo(Taxi::class);
    }
}
