<?php

use App\Livewire\CMS\Event\EventActive;
use App\Livewire\CMS\Event\EventAddPage;
use App\Livewire\CMS\Event\EventClonePage;
use App\Livewire\CMS\Event\EventDelete;
use App\Livewire\CMS\Event\EventDeleteImage;
use App\Livewire\CMS\Event\EventDeletePermanent;
use App\Livewire\CMS\Event\EventDeletePermanentAll;
use App\Livewire\CMS\Event\EventDeleteVideo;
use App\Livewire\CMS\Event\EventEditPage;
use App\Livewire\CMS\Event\EventPage;
use App\Livewire\CMS\Event\EventRestore;
use App\Livewire\CMS\Event\EventRestoreAll;
use App\Livewire\CMS\Event\EventTrashPage;
use App\Livewire\CMS\Event\EventViewPage;

Route::any('', EventPage::class)->name('index')->middleware('permission:Event');
Route::any('add', EventAddPage::class)->name('add')->middleware('permission:Event Add');
Route::any('clone/{event}', EventClonePage::class)->name('clone')->middleware('permission:Event Clone');
Route::any('edit/{event}', EventEditPage::class)->name('edit')->middleware('permission:Event Edit');
Route::any('delete/{event}', EventDelete::class)->name('delete')->middleware('permission:Event Delete');
Route::any('delete-image/{event}', EventDeleteImage::class)->name('delete-image')->middleware('permission:Event Edit');
Route::any('delete-video/{event}', EventDeleteVideo::class)->name('delete-video')->middleware('permission:Event Edit');
Route::any('active/{event}', EventActive::class)->name('active')->middleware('permission:Event Active');
Route::any('view/{event}', EventViewPage::class)->name('view')->middleware('permission:Event View');
Route::any('trash', EventTrashPage::class)->name('trash')->middleware('permission:Event Trash');
Route::any('restore/{event}', EventRestore::class)->name('restore')->middleware('permission:Event Restore');
Route::any('delete-permanent/{event}', EventDeletePermanent::class)->name('delete-permanent')->middleware('permission:Event Delete Permanent');
Route::any('restore-all', EventRestoreAll::class)->name('restore-all')->middleware('permission:Event Restore All');
Route::any('delete-permanent-all', EventDeletePermanentAll::class)->name('delete-permanent-all')->middleware('permission:Event Delete Permanent All');
