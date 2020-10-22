<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Taxi;

class City extends Model
{
    protected $fillable = ['name', 'name_for_display', 'description', 'updated_at', 'meta_description', 'meta_keywords', 'slug', 'seo_title',];
    protected $appends = [
        'taxiCount',
        'organizationsCount',
    ];

    public function getTaxiCountAttribute() {
        $count = Taxi::where('city_id', $this->id)->count();
        return $count;
    }

    public function getOrganizationsCountAttribute() {
        $count = Organization::where('city_id', $this->id)->count();
        return $count;
    }

    public function organizationTypeCount($slug) {
        $category_id = OrganizationCategory::where('slug', $slug)->first()->id;
        $count = Organization::where('city_id', $this->id)
            ->where('category_id', $category_id)
            ->count();
        return $count;
    }
}
