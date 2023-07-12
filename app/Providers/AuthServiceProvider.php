<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('create-item', function ($user) {
            return $user->can('administrator');
        });

        Gate::define('edit-item', function ($user, $item) {
            return $user->can('administrator');
        });
        
        Gate::define('delete-item', function ($user, $item) {
            return $user->can('administrator');
        });    
    }
}
