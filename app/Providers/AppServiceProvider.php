<?php

namespace App\Providers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\OrganizationCategory;
use App\Models\Organization;
use App\Observers\BlogCategoryObserver;
use App\Observers\BlogPostObserver;
use App\Observers\OrganizationCategoryObserver;
use App\Observers\OrganizationObserver;
use App\Observers\UserObserver;
use App\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::defaultView('components.paginator.bootstrap-4');

        BlogPost::observe(BlogPostObserver::class);
        BlogCategory::observe(BlogCategoryObserver::class);
        OrganizationCategory::observe(OrganizationCategoryObserver::class);
        Organization::observe(OrganizationObserver::class);
        User::observe(UserObserver::class);

        \Validator::extend('recaptcha', 'App\Validators\ReCaptcha@validate');
    }
}
