<?php

use App\Livewire\CMS\Configuration\ActivityPage;
use App\Livewire\CMS\Configuration\ConfigurationPage;
use Illuminate\Support\Facades\Route;

Route::any('', ConfigurationPage::class)->name('index')->middleware('permission:Configuration');
Route::any('activity', ActivityPage::class)->name('activity')->middleware('permission:Activity');

Route::prefix('user')->name('user.')->as('user.')
    ->middleware(['role:Super User|Configuration|User'])
    ->group(base_path('routes/cms/configuration/user.php'));

Route::prefix('role')->name('role.')->as('role.')
    ->middleware(['role:Super User|Configuration|Role'])
    ->group(base_path('routes/cms/configuration/role.php'));

Route::prefix('permission')->name('permission.')->as('permission.')
    ->middleware(['role:Super User|Configuration|Permission'])
    ->group(base_path('routes/cms/configuration/permission.php'));

Route::prefix('setting')->name('setting.')->as('setting.')
    ->middleware(['role:Super User|Configuration|Setting'])
    ->group(base_path('routes/cms/configuration/setting.php'));
