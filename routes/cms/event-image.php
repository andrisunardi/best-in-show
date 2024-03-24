<?php

use App\Livewire\CMS\EventImage\EventImageActive;
use App\Livewire\CMS\EventImage\EventImageAddPage;
use App\Livewire\CMS\EventImage\EventImageClonePage;
use App\Livewire\CMS\EventImage\EventImageDelete;
use App\Livewire\CMS\EventImage\EventImageDeleteImage;
use App\Livewire\CMS\EventImage\EventImageDeletePermanent;
use App\Livewire\CMS\EventImage\EventImageDeletePermanentAll;
use App\Livewire\CMS\EventImage\EventImageEditPage;
use App\Livewire\CMS\EventImage\EventImagePage;
use App\Livewire\CMS\EventImage\EventImageRestore;
use App\Livewire\CMS\EventImage\EventImageRestoreAll;
use App\Livewire\CMS\EventImage\EventImageTrashPage;
use App\Livewire\CMS\EventImage\EventImageViewPage;
use Illuminate\Support\Facades\Route;

Route::any('', EventImagePage::class)->name('index')->middleware('permission:Event Image');
Route::any('add', EventImageAddPage::class)->name('add')->middleware('permission:Event Image Add');
Route::any('clone/{eventImage}', EventImageClonePage::class)->name('clone')->middleware('permission:Event Image Clone');
Route::any('edit/{eventImage}', EventImageEditPage::class)->name('edit')->middleware('permission:Event Image Edit');
Route::any('delete/{eventImage}', EventImageDelete::class)->name('delete')->middleware('permission:Event Image Delete');
Route::any('delete-image/{eventImage}', EventImageDeleteImage::class)->name('delete-image')->middleware('permission:Event Image Edit');
Route::any('active/{eventImage}', EventImageActive::class)->name('active')->middleware('permission:Event Image Active');
Route::any('view/{eventImage}', EventImageViewPage::class)->name('view')->middleware('permission:Event Image View');
Route::any('trash', EventImageTrashPage::class)->name('trash')->middleware('permission:Event Image Trash');
Route::any('restore/{eventImage}', EventImageRestore::class)->name('restore')->middleware('permission:Event Image Restore');
Route::any('delete-permanent/{eventImage}', EventImageDeletePermanent::class)->name('delete-permanent')->middleware('permission:Event Image Delete Permanent');
Route::any('restore-all', EventImageRestoreAll::class)->name('restore-all')->middleware('permission:Event Image Restore All');
Route::any('delete-permanent-all', EventImageDeletePermanentAll::class)->name('delete-permanent-all')->middleware('permission:Event Image Delete Permanent All');
