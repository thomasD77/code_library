<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        // These are Gates with Permissions
        Gate::define('edit_posts', function ($user){
            $permission = 'edit_posts';
            return $user = $user->permissions()->contains($permission);
        });

        Gate::define('isAdmin', function ($user){
            $permission = 'isAdmin';
            return $user = $user->permissions()->contains($permission);
        });

        Gate::define('isCustomer', function ($user){
            $permission = 'isCustomer';
            return $user = $user->permissions()->contains($permission);
        });

        Gate::define('isSubscriber', function ($user){
            $permission = 'isSubscriber';
            return $user = $user->permissions()->contains($permission);
        });


        // This is a Gate made with Function in User.php
        Gate::define('isUser', function($user){
            return $user->isUser();
        });




    }
}
