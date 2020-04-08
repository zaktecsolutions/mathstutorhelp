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
        // Authorize all users
        Gate::define('manage-users', function($user) {
            return $user->hasAnyRoles(['admin', 'tutor','student']);
        });
        // Authorize only admin
        Gate::define('admin-gate', function($user) {
            return $user->hasRole('admin');
        });
        // Authorize only student
        Gate::define('student-gate', function($user) {
            return $user->hasRole('student');
        });
         // Authorize only tutor
        Gate::define('tutor-gate', function($user) {
            return $user->hasRole('tutor');
        });

        Gate::define('edit-users', function($user) {
            return $user->hasAnyRoles(['admin', 'tutor']);
        });

       

        //
    }
}
