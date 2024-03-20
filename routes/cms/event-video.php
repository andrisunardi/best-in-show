<?php

use App\Livewire\CMS\EventVideo\EventVideoActive;
use App\Livewire\CMS\EventVideo\EventVideoAddPage;
use App\Livewire\CMS\EventVideo\EventVideoClonePage;
use App\Livewire\CMS\EventVideo\EventVideoDelete;
use App\Livewire\CMS\EventVideo\EventVideoDeletePermanent;
use App\Livewire\CMS\EventVideo\EventVideoDeletePermanentAll;
use App\Livewire\CMS\EventVideo\EventVideoDeleteVideo;
use App\Livewire\CMS\EventVideo\EventVideoEditPage;
use App\Livewire\CMS\EventVideo\EventVideoPage;
use App\Livewire\CMS\EventVideo\EventVideoRestore;
use App\Livewire\CMS\EventVideo\EventVideoRestoreAll;
use App\Livewire\CMS\EventVideo\EventVideoTrashPage;
use App\Livewire\CMS\EventVideo\EventVideoViewPage;

Route::any('', EventVideoPage::class)->name('index')->middleware('permission:Event Video');
Route::any('add', EventVideoAddPage::class)->name('add')->middleware('permission:Event Video Add');
Route::any('clone/{eventVideo}', EventVideoClonePage::class)->name('clone')->middleware('permission:Event Video Clone');
Route::any('edit/{eventVideo}', EventVideoEditPage::class)->name('edit')->middleware('permission:Event Video Edit');
Route::any('delete/{eventVideo}', EventVideoDelete::class)->name('delete')->middleware('permission:Event Video Delete');
Route::any('delete-image/{eventVideo}', EventVideoDeleteVideo::class)->name('delete-image')->middleware('permission:Event Video Edit');
Route::any('active/{eventVideo}', EventVideoActive::class)->name('active')->middleware('permission:Event Video Active');
Route::any('view/{eventVideo}', EventVideoViewPage::class)->name('view')->middleware('permission:Event Video View');
Route::any('trash', EventVideoTrashPage::class)->name('trash')->middleware('permission:Event Video Trash');
Route::any('restore/{eventVideo}', EventVideoRestore::class)->name('restore')->middleware('permission:Event Video Restore');
Route::any('delete-permanent/{eventVideo}', EventVideoDeletePermanent::class)->name('delete-permanent')->middleware('permission:Event Video Delete Permanent');
Route::any('restore-all', EventVideoRestoreAll::class)->name('restore-all')->middleware('permission:Event Video Restore All');
Route::any('delete-permanent-all', EventVideoDeletePermanentAll::class)->name('delete-permanent-all')->middleware('permission:Event Video Delete Permanent All');
