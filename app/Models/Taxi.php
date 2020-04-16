<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taxi extends Model
{
    protected $appends = [
        'phoneNumbers',
    ];

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function getPhoneNumbersAttribute() {
        $phones = $this->phone_number;
        $phones_array = explode(',', $phones);
        return $phones_array;
    }
}
