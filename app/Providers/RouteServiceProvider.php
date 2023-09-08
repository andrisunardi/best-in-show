<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/';

    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->namespace("App\Http\Controllers\API")
                ->name('api')
                ->as('api.')
                ->domain('api.'.env('APP_DOMAIN'))
                ->group(base_path('routes/api.php'));

            Route::middleware('api')
                ->namespace("App\Http\Controllers\API")
                ->name('api')
                ->as('api.')
                ->domain('www.api.'.env('APP_DOMAIN'))
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace("App\Livewire\CMS")
                ->name('cms')
                ->as('cms.')
                ->domain('cms.'.env('APP_DOMAIN'))
                ->group(base_path('routes/cms.php'));

            Route::middleware('web')
                ->namespace("App\Livewire\CMS")
                ->name('cms')
                ->as('cms.')
                ->domain('www.cms.'.env('APP_DOMAIN'))
                ->group(base_path('routes/cms.php'));

            Route::middleware('web')
                ->namespace("App\Livewire")
                ->domain(env('APP_DOMAIN'))
                ->group(base_path('routes/web.php'));

            Route::middleware('web')
                ->namespace("App\Livewire")
                ->domain('www.'.env('APP_DOMAIN'))
                ->group(base_path('routes/web.php'));
        });
    }
}
