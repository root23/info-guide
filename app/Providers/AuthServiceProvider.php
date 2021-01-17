<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-categories', function ($user) {
           return $user->hasRole('admin');
        });
        Gate::define('manage-posts', function ($user) {
            return $user->hasAnyRoles(['admin', 'author']);
        });
        Gate::define('manage-cities', function ($user) {
            return $user->hasRole('admin');
        });
        Gate::define('manage-taxis', function ($user) {
            return $user->hasRole('admin');
        });
        Gate::define('manage-contacts', function ($user) {
            return $user->hasRole('admin');
        });
        Gate::define('manage-organizations', function($user){
           return $user->hasRole('admin');
        });
        Gate::define('manage-users', function ($user) {
            return $user->hasRole('admin');
        });
    }
}
