<?php

namespace App\Observers;

use App\Models\OrganizationCategory;
use Illuminate\Support\Str;

class OrganizationCategoryObserver
{
    /**
     * Handle the models blog category "created" event.
     *
     * @param  \App\Models\OrganizationCategory  $organizationCategory
     * @return void
     */
    public function created(OrganizationCategory $organizationCategory)
    {
        //
    }

    /**
     * @param OrganizationCategory $organizationCategory
     */
    public function creating(OrganizationCategory $organizationCategory) {
        $this->setSlug($organizationCategory);
    }

    /**
     * @param OrganizationCategory $organizationCategory
     */
    protected function setSlug(OrganizationCategory $organizationCategory) {
        if (empty($organizationCategory->slug)) {
            $organizationCategory->slug = Str::slug($organizationCategory->title);
        }
    }

    /**
     * Handle the models blog category "updated" event.
     *
     * @param  \App\Models\OrganizationCategory  $organizationCategory
     * @return void
     */
    public function updated(OrganizationCategory $organizationCategory)
    {
        //
    }

    public function updating(OrganizationCategory $organizationCategory) {
        $this->setSlug($organizationCategory);
    }

    /**
     * Handle the models blog category "deleted" event.
     *
     * @param  \App\Models\OrganizationCategory  $organizationCategory
     * @return void
     */
    public function deleted(OrganizationCategory $organizationCategory)
    {
        //
    }

    /**
     * Handle the models blog category "restored" event.
     *
     * @param  \App\Models\OrganizationCategory  $organizationCategory
     * @return void
     */
    public function restored(OrganizationCategory $organizationCategory)
    {
        //
    }

    /**
     * Handle the models blog category "force deleted" event.
     *
     * @param  \App\Models\OrganizationCategory  $organizationCategory
     * @return void
     */
    public function forceDeleted(OrganizationCategory $organizationCategory)
    {
        //
    }
}
