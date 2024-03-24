<?php

use App\Livewire\CMS\Banner\BannerActive;
use App\Livewire\CMS\Banner\BannerAddPage;
use App\Livewire\CMS\Banner\BannerClonePage;
use App\Livewire\CMS\Banner\BannerDelete;
use App\Livewire\CMS\Banner\BannerDeleteImage;
use App\Livewire\CMS\Banner\BannerDeletePermanent;
use App\Livewire\CMS\Banner\BannerDeletePermanentAll;
use App\Livewire\CMS\Banner\BannerEditPage;
use App\Livewire\CMS\Banner\BannerPage;
use App\Livewire\CMS\Banner\BannerRestore;
use App\Livewire\CMS\Banner\BannerRestoreAll;
use App\Livewire\CMS\Banner\BannerTrashPage;
use App\Livewire\CMS\Banner\BannerViewPage;
use Illuminate\Support\Facades\Route;

Route::any('', BannerPage::class)->name('index')->middleware('permission:Banner');
Route::any('add', BannerAddPage::class)->name('add')->middleware('permission:Banner Add');
Route::any('clone/{banner}', BannerClonePage::class)->name('clone')->middleware('permission:Banner Clone');
Route::any('edit/{banner}', BannerEditPage::class)->name('edit')->middleware('permission:Banner Edit');
Route::any('delete/{banner}', BannerDelete::class)->name('delete')->middleware('permission:Banner Delete');
Route::any('delete-image/{banner}', BannerDeleteImage::class)->name('delete-image')->middleware('permission:Banner Edit');
Route::any('active/{banner}', BannerActive::class)->name('active')->middleware('permission:Banner Active');
Route::any('view/{banner}', BannerViewPage::class)->name('view')->middleware('permission:Banner View');
Route::any('trash', BannerTrashPage::class)->name('trash')->middleware('permission:Banner Trash');
Route::any('restore/{banner}', BannerRestore::class)->name('restore')->middleware('permission:Banner Restore');
Route::any('delete-permanent/{banner}', BannerDeletePermanent::class)->name('delete-permanent')->middleware('permission:Banner Delete Permanent');
Route::any('restore-all', BannerRestoreAll::class)->name('restore-all')->middleware('permission:Banner Restore All');
Route::any('delete-permanent-all', BannerDeletePermanentAll::class)->name('delete-permanent-all')->middleware('permission:Banner Delete Permanent All');
