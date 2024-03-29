<?php

use App\Livewire\CMS\Product\ProductActive;
use App\Livewire\CMS\Product\ProductAddPage;
use App\Livewire\CMS\Product\ProductClonePage;
use App\Livewire\CMS\Product\ProductDelete;
use App\Livewire\CMS\Product\ProductDeleteImage;
use App\Livewire\CMS\Product\ProductDeletePermanent;
use App\Livewire\CMS\Product\ProductDeletePermanentAll;
use App\Livewire\CMS\Product\ProductEditPage;
use App\Livewire\CMS\Product\ProductPage;
use App\Livewire\CMS\Product\ProductRestore;
use App\Livewire\CMS\Product\ProductRestoreAll;
use App\Livewire\CMS\Product\ProductTrashPage;
use App\Livewire\CMS\Product\ProductViewPage;
use Illuminate\Support\Facades\Route;

Route::any('', ProductPage::class)->name('index')->middleware('permission:Product');
Route::any('add', ProductAddPage::class)->name('add')->middleware('permission:Product Add');
Route::any('clone/{product}', ProductClonePage::class)->name('clone')->middleware('permission:Product Clone');
Route::any('edit/{product}', ProductEditPage::class)->name('edit')->middleware('permission:Product Edit');
Route::any('delete/{product}', ProductDelete::class)->name('delete')->middleware('permission:Product Delete');
Route::any('delete-image/{product}', ProductDeleteImage::class)->name('delete-image')->middleware('permission:Product Edit');
Route::any('active/{product}', ProductActive::class)->name('active')->middleware('permission:Product Active');
Route::any('view/{product}', ProductViewPage::class)->name('view')->middleware('permission:Product View');
Route::any('trash', ProductTrashPage::class)->name('trash')->middleware('permission:Product Trash');
Route::any('restore/{product}', ProductRestore::class)->name('restore')->middleware('permission:Product Restore');
Route::any('delete-permanent/{product}', ProductDeletePermanent::class)->name('delete-permanent')->middleware('permission:Product Delete Permanent');
Route::any('restore-all', ProductRestoreAll::class)->name('restore-all')->middleware('permission:Product Restore All');
Route::any('delete-permanent-all', ProductDeletePermanentAll::class)->name('delete-permanent-all')->middleware('permission:Product Delete Permanent All');
