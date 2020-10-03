<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationReview extends Model
{
    protected $fillable = ['name','email','message','organization_id', 'rating'];

    public function organization() {
        return $this->belongsTo(Organization::class);
    }
}
