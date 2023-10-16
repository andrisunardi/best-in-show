<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Horizon\Horizon;
use Laravel\Horizon\HorizonApplicationServiceProvider;

class HorizonServiceProvider extends HorizonApplicationServiceProvider
{
    public function boot(): void
    {
        parent::boot();

        Horizon::routeSmsNotificationsTo(env('SLACK_SMS'));
        Horizon::routeMailNotificationsTo(env('SLACK_MAIL'));
        Horizon::routeSlackNotificationsTo(env('LOG_SLACK_WEBHOOK_URL'), '#'.env('SLACK_CHANNEL'));
    }

    protected function gate(): void
    {
        Gate::define('viewHorizon', function ($user) {
            return $user->hasRole('Super User');
        });
    }
}
