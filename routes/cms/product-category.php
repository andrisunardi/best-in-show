<?php

use App\Livewire\CMS\ProductCategory\ProductCategoryActive;
use App\Livewire\CMS\ProductCategory\ProductCategoryAddPage;
use App\Livewire\CMS\ProductCategory\ProductCategoryClonePage;
use App\Livewire\CMS\ProductCategory\ProductCategoryDelete;
use App\Livewire\CMS\ProductCategory\ProductCategoryDeleteImage;
use App\Livewire\CMS\ProductCategory\ProductCategoryDeletePermanent;
use App\Livewire\CMS\ProductCategory\ProductCategoryDeletePermanentAll;
use App\Livewire\CMS\ProductCategory\ProductCategoryEditPage;
use App\Livewire\CMS\ProductCategory\ProductCategoryPage;
use App\Livewire\CMS\ProductCategory\ProductCategoryRestore;
use App\Livewire\CMS\ProductCategory\ProductCategoryRestoreAll;
use App\Livewire\CMS\ProductCategory\ProductCategoryTrashPage;
use App\Livewire\CMS\ProductCategory\ProductCategoryViewPage;
use Illuminate\Support\Facades\Route;

Route::any('', ProductCategoryPage::class)->name('index')->middleware('permission:Product Category');
Route::any('add', ProductCategoryAddPage::class)->name('add')->middleware('permission:Product Category Add');
Route::any('clone/{productCategory}', ProductCategoryClonePage::class)->name('clone')->middleware('permission:Product Category Clone');
Route::any('edit/{productCategory}', ProductCategoryEditPage::class)->name('edit')->middleware('permission:Product Category Edit');
Route::any('delete/{productCategory}', ProductCategoryDelete::class)->name('delete')->middleware('permission:Product Category Delete');
Route::any('delete-image/{productCategory}', ProductCategoryDeleteImage::class)->name('delete-image')->middleware('permission:Product Category Edit');
Route::any('active/{productCategory}', ProductCategoryActive::class)->name('active')->middleware('permission:Product Category Active');
Route::any('view/{productCategory}', ProductCategoryViewPage::class)->name('view')->middleware('permission:Product Category View');
Route::any('trash', ProductCategoryTrashPage::class)->name('trash')->middleware('permission:Product Category Trash');
Route::any('restore/{productCategory}', ProductCategoryRestore::class)->name('restore')->middleware('permission:Product Category Restore');
Route::any('delete-permanent/{productCategory}', ProductCategoryDeletePermanent::class)->name('delete-permanent')->middleware('permission:Product Category Delete Permanent');
Route::any('restore-all', ProductCategoryRestoreAll::class)->name('restore-all')->middleware('permission:Product Category Restore All');
Route::any('delete-permanent-all', ProductCategoryDeletePermanentAll::class)->name('delete-permanent-all')->middleware('permission:Product Category Delete Permanent All');
