<?php

use App\Livewire\CMS\ProductType\ProductTypeActive;
use App\Livewire\CMS\ProductType\ProductTypeAddPage;
use App\Livewire\CMS\ProductType\ProductTypeClonePage;
use App\Livewire\CMS\ProductType\ProductTypeDelete;
use App\Livewire\CMS\ProductType\ProductTypeDeleteImage;
use App\Livewire\CMS\ProductType\ProductTypeDeletePermanent;
use App\Livewire\CMS\ProductType\ProductTypeDeletePermanentAll;
use App\Livewire\CMS\ProductType\ProductTypeEditPage;
use App\Livewire\CMS\ProductType\ProductTypePage;
use App\Livewire\CMS\ProductType\ProductTypeRestore;
use App\Livewire\CMS\ProductType\ProductTypeRestoreAll;
use App\Livewire\CMS\ProductType\ProductTypeTrashPage;
use App\Livewire\CMS\ProductType\ProductTypeViewPage;
use Illuminate\Support\Facades\Route;

Route::any('', ProductTypePage::class)->name('index')->middleware('permission:Product Type');
Route::any('add', ProductTypeAddPage::class)->name('add')->middleware('permission:Product Type Add');
Route::any('clone/{productType}', ProductTypeClonePage::class)->name('clone')->middleware('permission:Product Type Clone');
Route::any('edit/{productType}', ProductTypeEditPage::class)->name('edit')->middleware('permission:Product Type Edit');
Route::any('delete/{productType}', ProductTypeDelete::class)->name('delete')->middleware('permission:Product Type Delete');
Route::any('delete-image/{productType}', ProductTypeDeleteImage::class)->name('delete-image')->middleware('permission:Product Type Edit');
Route::any('active/{productType}', ProductTypeActive::class)->name('active')->middleware('permission:Product Type Active');
Route::any('view/{productType}', ProductTypeViewPage::class)->name('view')->middleware('permission:Product Type View');
Route::any('trash', ProductTypeTrashPage::class)->name('trash')->middleware('permission:Product Type Trash');
Route::any('restore/{productType}', ProductTypeRestore::class)->name('restore')->middleware('permission:Product Type Restore');
Route::any('delete-permanent/{productType}', ProductTypeDeletePermanent::class)->name('delete-permanent')->middleware('permission:Product Type Delete Permanent');
Route::any('restore-all', ProductTypeRestoreAll::class)->name('restore-all')->middleware('permission:Product Type Restore All');
Route::any('delete-permanent-all', ProductTypeDeletePermanentAll::class)->name('delete-permanent-all')->middleware('permission:Product Type Delete Permanent All');
