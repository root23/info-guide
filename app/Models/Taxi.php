<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Taxi extends Model
{
    use Searchable;

    protected $fillable = ['title', 'description', 'updated_at', 'phone_number', 'meta_keywords', 'meta_description',];

    const SEARCHABLE_FIELDS = ['id', 'title', 'description', ];

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

    public function toSearchableArray() {
        return $this->only(self::SEARCHABLE_FIELDS);
    }

    public function getLinkAttribute(): string {
        return '/taxi/taxis/' . $this->id . '/';
    }
}
