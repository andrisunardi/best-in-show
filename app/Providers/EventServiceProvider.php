<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\User;
use App\Observers\PermissionObserver;
use App\Observers\RoleObserver;
use App\Observers\SettingObserver;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    public function boot(): void
    {
        Permission::observe(PermissionObserver::class);
        Role::observe(RoleObserver::class);
        Setting::observe(SettingObserver::class);
        User::observe(UserObserver::class);
    }

    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
