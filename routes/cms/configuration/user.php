<?php

use App\Livewire\CMS\Configuration\User\UserActive;
use App\Livewire\CMS\Configuration\User\UserAddPage;
use App\Livewire\CMS\Configuration\User\UserClonePage;
use App\Livewire\CMS\Configuration\User\UserDelete;
use App\Livewire\CMS\Configuration\User\UserDeleteImage;
use App\Livewire\CMS\Configuration\User\UserDeletePermanent;
use App\Livewire\CMS\Configuration\User\UserDeletePermanentAll;
use App\Livewire\CMS\Configuration\User\UserEditPage;
use App\Livewire\CMS\Configuration\User\UserPage;
use App\Livewire\CMS\Configuration\User\UserRestore;
use App\Livewire\CMS\Configuration\User\UserRestoreAll;
use App\Livewire\CMS\Configuration\User\UserTrashPage;
use App\Livewire\CMS\Configuration\User\UserViewPage;
use Illuminate\Support\Facades\Route;

Route::any('', UserPage::class)->name('index')->middleware('permission:User');
Route::any('add', UserAddPage::class)->name('add')->middleware('permission:User Add');
Route::any('clone/{user}', UserClonePage::class)->name('clone')->middleware('permission:User Clone');
Route::any('edit/{user}', UserEditPage::class)->name('edit')->middleware('permission:User Edit');
Route::any('active/{user}', UserActive::class)->name('active')->middleware('permission:User Active');
Route::any('delete/{user}', UserDelete::class)->name('delete')->middleware('permission:User Delete');
Route::any('delete-image/{user}', UserDeleteImage::class)->name('delete-image')->middleware('permission:User Edit');
Route::any('view/{user}', UserViewPage::class)->name('view')->middleware('permission:User View');
Route::any('trash', UserTrashPage::class)->name('trash')->middleware('permission:User Trash');
Route::any('restore/{user}', UserRestore::class)->name('restore')->middleware('permission:User Restore');
Route::any('delete-permanent/{user}', UserDeletePermanent::class)->name('delete-permanent')->middleware('permission:User Delete Permanent');
Route::any('restore-all', UserRestoreAll::class)->name('restore-all')->middleware('permission:User Restore All');
Route::any('delete-permanent-all', UserDeletePermanentAll::class)->name('delete-permanent-all')->middleware('permission:User Delete Permanent All');
