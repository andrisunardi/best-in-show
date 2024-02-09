<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        //
    ];

    public function boot(): void
    {
        Gate::before(function (User $user) {
            return $user->hasRole('Super User');
        });

        Gate::after(function (User $user) {
            return $user->hasRole('Super User');
        });

        Gate::define('viewLogViewer', function (User $user) {
            return $user->hasRole('Super User');
        });
    }
}
