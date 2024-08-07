<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;


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
        $count = UserRole::count();
        if($count > 0){
            abort(403);
        }

        $this->registerPolicies();

        Blade::if('isRole', function ($role) {
            return Auth::check() && Auth::user()->role === $role;
        });
        
    }
}
