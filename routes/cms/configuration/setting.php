<?php

use App\Livewire\CMS\Configuration\Setting\SettingActive;
use App\Livewire\CMS\Configuration\Setting\SettingAddPage;
use App\Livewire\CMS\Configuration\Setting\SettingClonePage;
use App\Livewire\CMS\Configuration\Setting\SettingDelete;
use App\Livewire\CMS\Configuration\Setting\SettingDeletePermanent;
use App\Livewire\CMS\Configuration\Setting\SettingDeletePermanentAll;
use App\Livewire\CMS\Configuration\Setting\SettingEditPage;
use App\Livewire\CMS\Configuration\Setting\SettingPage;
use App\Livewire\CMS\Configuration\Setting\SettingRestore;
use App\Livewire\CMS\Configuration\Setting\SettingRestoreAll;
use App\Livewire\CMS\Configuration\Setting\SettingTrashPage;
use App\Livewire\CMS\Configuration\Setting\SettingViewPage;
use Illuminate\Support\Facades\Route;

Route::any('', SettingPage::class)->name('index')->middleware('permission:Setting');
Route::any('add', SettingAddPage::class)->name('add')->middleware('permission:Setting Add');
Route::any('clone/{setting}', SettingClonePage::class)->name('clone')->middleware('permission:Setting Clone');
Route::any('edit/{setting}', SettingEditPage::class)->name('edit')->middleware('permission:Setting Edit');
Route::any('active/{setting}', SettingActive::class)->name('active')->middleware('permission:Setting Active');
Route::any('delete/{setting}', SettingDelete::class)->name('delete')->middleware('permission:Setting Delete');
Route::any('view/{setting}', SettingViewPage::class)->name('view')->middleware('permission:Setting View');
Route::any('trash', SettingTrashPage::class)->name('trash')->middleware('permission:Setting Trash');
Route::any('restore/{setting}', SettingRestore::class)->name('restore')->middleware('permission:Setting Restore');
Route::any('delete-permanent/{setting}', SettingDeletePermanent::class)->name('delete-permanent')->middleware('permission:Setting Delete Permanent');
Route::any('restore-all', SettingRestoreAll::class)->name('restore-all')->middleware('permission:Setting Restore All');
Route::any('delete-permanent-all', SettingDeletePermanentAll::class)->name('delete-permanent-all')->middleware('permission:Setting Delete Permanent All');
