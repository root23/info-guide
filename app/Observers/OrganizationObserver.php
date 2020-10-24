<?php

namespace App\Observers;

use App\Models\Organization;
use Carbon\Carbon;
use Illuminate\Support\Str;
use GrahamCampbell\Markdown\Facades\Markdown;

class OrganizationObserver
{
    public function creating(Organization $organization) {
        $this->setPublishedAt($organization);
        $this->setSlug($organization);
        $this->setUser($organization);
    }

    public function updating(Organization $organization) {
        $this->setPublishedAt($organization);
        $this->setSlug($organization);
    }

    /**
     * Если дата пустая
     *
     * @param Organization $organization
     */
    protected function setPublishedAt(Organization $organization) {
        if (empty($organization->published_at) && $organization->is_published) {
            $organization->published_at = Carbon::now();
        }
    }

    /**
     * Если slug пустой
     *
     * @param Organization $organization
     */
    protected function setSlug(Organization $organization) {
        $slug = Str::slug($organization->title);
        $count = Organization::where('slug', 'LIKE', "{$slug}%")->count();
        $newCount = $count > 0 ? ++$count : '';
        $organization->slug = $newCount > 0 ? "$slug-$newCount" : $slug;
    }

    /**
     * Устанавливает пользователя, опубликовавшего организацию
     *
     * @param Organization $organization
     */
    protected function setUser(Organization $organization) {
        $organization->user_id = auth()->id() ?? Organization::UNKNOWN_USER;
    }

}
