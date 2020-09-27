<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogPost
 * @package App\Models
 *
 * @property \App\Models\Organization $organization
 * @property \App\Models\User $user
 *
 */

class Organization extends Model
{
    use SoftDeletes;

    const UNKNOWN_USER = 1;

    protected $fillable = ['category_id', 'slug', 'title', 'is_published', 'published_at',];

    /**
     * Категория организации
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category() {
        return $this->belongsTo(OrganizationCategory::class);
    }

    /**
     * Пользователь организации
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
