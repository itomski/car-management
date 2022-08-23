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
        //'App\Vehicle' => 'App\Policies\VehiclePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function($user) {
            foreach($user->roles as $role) {
                if($role->name === 'Admin')
                    return true;
            }
            return false;
        });

        Gate::define('isCustomer', function($user) {
            foreach($user->roles as $role) {
                if($role->name === 'Customer')
                    return true;
            }
            return false;
        });

        Gate::define('isModerator', function($user) {
            foreach($user->roles as $role) {
                if($role->name === 'Moderator')
                    return true;
            }
            return false;
        });
    }
}
