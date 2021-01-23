<?php

namespace App\Models\RSS;

use App\Models\City;
use App\Models\OrganizationCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class OrganizationItem extends Model implements Feedable {

    protected $table = 'organizations';
    protected $dates = ['updated_at'];

    public function toFeedItem(): FeedItem {
        $city = City::where('id', $this->city_id)->first();
        $category = OrganizationCategory::where('id', $this->category_id)->first();

        return FeedItem::create([
            'id' => $this->id,
            'title' => $this->title,
            'summary' => $this->content_raw,
            'updated' => new Carbon($this->updated_at),
            'link' => '/kompanii/' . $city->slug . '/' . $category->slug . '/' . $this->slug,
            'author' => $this->user_id,
        ]);
    }

    public static function getFeedItems() {
        return static::all();
    }
}
