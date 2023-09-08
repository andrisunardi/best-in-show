<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [

    'name' => env('APP_NAME', 'Laravel'),

    'env' => env('APP_ENV', 'production'),

    'debug' => (bool) env('APP_DEBUG', false),

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL'),

    'timezone' => env('APP_TIMEZONE', 'UTC'),

    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    'maintenance' => [
        'driver' => 'file',
        // 'store'  => 'redis',
    ],

    'cms_roles' => ['Super User', 'Admin'],

    'route_cms_roles' => 'Super User|Admin',

    'providers' => ServiceProvider::defaultProviders()->merge([
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

        App\Providers\HorizonServiceProvider::class,
        App\Providers\TelescopeServiceProvider::class,

        Maatwebsite\Excel\ExcelServiceProvider::class,
        Barryvdh\DomPDF\ServiceProvider::class,
        Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class,
        Spatie\Permission\PermissionServiceProvider::class,
        Spatie\Menu\Laravel\MenuServiceProvider::class,

        PrettyRoutes\ServiceProvider::class,
    ])->toArray(),

    'aliases' => Facade::defaultAliases()->merge([
        'Excel' => Maatwebsite\Excel\Facades\Excel::class,
        'PDF' => Barryvdh\DomPDF\Facade::class,
        'Menu' => Spatie\Menu\Laravel\Facades\Menu::class,
    ])->toArray(),
];
