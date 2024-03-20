<?php

use App\Livewire\CMS\Slider\SliderActive;
use App\Livewire\CMS\Slider\SliderAddPage;
use App\Livewire\CMS\Slider\SliderClonePage;
use App\Livewire\CMS\Slider\SliderDelete;
use App\Livewire\CMS\Slider\SliderDeleteImage;
use App\Livewire\CMS\Slider\SliderDeletePermanent;
use App\Livewire\CMS\Slider\SliderDeletePermanentAll;
use App\Livewire\CMS\Slider\SliderEditPage;
use App\Livewire\CMS\Slider\SliderPage;
use App\Livewire\CMS\Slider\SliderRestore;
use App\Livewire\CMS\Slider\SliderRestoreAll;
use App\Livewire\CMS\Slider\SliderTrashPage;
use App\Livewire\CMS\Slider\SliderViewPage;
use Illuminate\Support\Facades\Route;

Route::any('', SliderPage::class)->name('index')->middleware('permission:Slider');
Route::any('add', SliderAddPage::class)->name('add')->middleware('permission:Slider Add');
Route::any('clone/{slider}', SliderClonePage::class)->name('clone')->middleware('permission:Slider Clone');
Route::any('edit/{slider}', SliderEditPage::class)->name('edit')->middleware('permission:Slider Edit');
Route::any('delete/{slider}', SliderDelete::class)->name('delete')->middleware('permission:Slider Delete');
Route::any('delete-image/{slider}', SliderDeleteImage::class)->name('delete-image')->middleware('permission:Slider Edit');
Route::any('active/{slider}', SliderActive::class)->name('active')->middleware('permission:Slider Active');
Route::any('view/{slider}', SliderViewPage::class)->name('view')->middleware('permission:Slider View');
Route::any('trash', SliderTrashPage::class)->name('trash')->middleware('permission:Slider Trash');
Route::any('restore/{slider}', SliderRestore::class)->name('restore')->middleware('permission:Slider Restore');
Route::any('delete-permanent/{slider}', SliderDeletePermanent::class)->name('delete-permanent')->middleware('permission:Slider Delete Permanent');
Route::any('restore-all', SliderRestoreAll::class)->name('restore-all')->middleware('permission:Slider Restore All');
Route::any('delete-permanent-all', SliderDeletePermanentAll::class)->name('delete-permanent-all')->middleware('permission:Slider Delete Permanent All');
