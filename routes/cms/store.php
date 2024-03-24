<?php

use App\Livewire\CMS\Store\StoreActive;
use App\Livewire\CMS\Store\StoreAddPage;
use App\Livewire\CMS\Store\StoreClonePage;
use App\Livewire\CMS\Store\StoreDelete;
use App\Livewire\CMS\Store\StoreDeletePermanent;
use App\Livewire\CMS\Store\StoreDeletePermanentAll;
use App\Livewire\CMS\Store\StoreEditPage;
use App\Livewire\CMS\Store\StorePage;
use App\Livewire\CMS\Store\StoreRestore;
use App\Livewire\CMS\Store\StoreRestoreAll;
use App\Livewire\CMS\Store\StoreTrashPage;
use App\Livewire\CMS\Store\StoreViewPage;
use Illuminate\Support\Facades\Route;

Route::any('', StorePage::class)->name('index')->middleware('permission:Store');
Route::any('add', StoreAddPage::class)->name('add')->middleware('permission:Store Add');
Route::any('clone/{store}', StoreClonePage::class)->name('clone')->middleware('permission:Store Clone');
Route::any('edit/{store}', StoreEditPage::class)->name('edit')->middleware('permission:Store Edit');
Route::any('delete/{store}', StoreDelete::class)->name('delete')->middleware('permission:Store Delete');
Route::any('active/{store}', StoreActive::class)->name('active')->middleware('permission:Store Active');
Route::any('view/{store}', StoreViewPage::class)->name('view')->middleware('permission:Store View');
Route::any('trash', StoreTrashPage::class)->name('trash')->middleware('permission:Store Trash');
Route::any('restore/{store}', StoreRestore::class)->name('restore')->middleware('permission:Store Restore');
Route::any('delete-permanent/{store}', StoreDeletePermanent::class)->name('delete-permanent')->middleware('permission:Store Delete Permanent');
Route::any('restore-all', StoreRestoreAll::class)->name('restore-all')->middleware('permission:Store Restore All');
Route::any('delete-permanent-all', StoreDeletePermanentAll::class)->name('delete-permanent-all')->middleware('permission:Store Delete Permanent All');
