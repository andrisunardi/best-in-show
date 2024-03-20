<?php

use App\Livewire\CMS\Pet\PetActive;
use App\Livewire\CMS\Pet\PetAddPage;
use App\Livewire\CMS\Pet\PetClonePage;
use App\Livewire\CMS\Pet\PetDelete;
use App\Livewire\CMS\Pet\PetDeleteImage;
use App\Livewire\CMS\Pet\PetDeletePermanent;
use App\Livewire\CMS\Pet\PetDeletePermanentAll;
use App\Livewire\CMS\Pet\PetDeleteProductImage;
use App\Livewire\CMS\Pet\PetEditPage;
use App\Livewire\CMS\Pet\PetPage;
use App\Livewire\CMS\Pet\PetRestore;
use App\Livewire\CMS\Pet\PetRestoreAll;
use App\Livewire\CMS\Pet\PetTrashPage;
use App\Livewire\CMS\Pet\PetViewPage;
use Illuminate\Support\Facades\Route;

Route::any('', PetPage::class)->name('index')->middleware('permission:Pet');
Route::any('add', PetAddPage::class)->name('add')->middleware('permission:Pet Add');
Route::any('clone/{pet}', PetClonePage::class)->name('clone')->middleware('permission:Pet Clone');
Route::any('edit/{pet}', PetEditPage::class)->name('edit')->middleware('permission:Pet Edit');
Route::any('delete/{pet}', PetDelete::class)->name('delete')->middleware('permission:Pet Delete');
Route::any('delete-image/{pet}', PetDeleteImage::class)->name('delete-image')->middleware('permission:Pet Edit');
Route::any('delete-product-image/{pet}', PetDeleteProductImage::class)->name('delete-product-image')->middleware('permission:Pet Edit');
Route::any('active/{pet}', PetActive::class)->name('active')->middleware('permission:Pet Active');
Route::any('view/{pet}', PetViewPage::class)->name('view')->middleware('permission:Pet View');
Route::any('trash', PetTrashPage::class)->name('trash')->middleware('permission:Pet Trash');
Route::any('restore/{pet}', PetRestore::class)->name('restore')->middleware('permission:Pet Restore');
Route::any('delete-permanent/{pet}', PetDeletePermanent::class)->name('delete-permanent')->middleware('permission:Pet Delete Permanent');
Route::any('restore-all', PetRestoreAll::class)->name('restore-all')->middleware('permission:Pet Restore All');
Route::any('delete-permanent-all', PetDeletePermanentAll::class)->name('delete-permanent-all')->middleware('permission:Pet Delete Permanent All');
