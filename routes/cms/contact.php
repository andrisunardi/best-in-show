<?php

use App\Livewire\CMS\Contact\ContactActive;
use App\Livewire\CMS\Contact\ContactDelete;
use App\Livewire\CMS\Contact\ContactDeletePermanent;
use App\Livewire\CMS\Contact\ContactDeletePermanentAll;
use App\Livewire\CMS\Contact\ContactPage;
use App\Livewire\CMS\Contact\ContactRestore;
use App\Livewire\CMS\Contact\ContactRestoreAll;
use App\Livewire\CMS\Contact\ContactTrashPage;
use App\Livewire\CMS\Contact\ContactViewPage;
use Illuminate\Support\Facades\Route;

Route::any('', ContactPage::class)->name('index')->middleware('permission:Contact');
Route::any('delete/{contact}', ContactDelete::class)->name('delete')->middleware('permission:Contact Delete');
Route::any('active/{contact}', ContactActive::class)->name('active')->middleware('permission:Contact Active');
Route::any('view/{contact}', ContactViewPage::class)->name('view')->middleware('permission:Contact View');
Route::any('trash', ContactTrashPage::class)->name('trash')->middleware('permission:Contact Trash');
Route::any('restore/{contact}', ContactRestore::class)->name('restore')->middleware('permission:Contact Restore');
Route::any('delete-permanent/{contact}', ContactDeletePermanent::class)->name('delete-permanent')->middleware('permission:Contact Delete Permanent');
Route::any('restore-all', ContactRestoreAll::class)->name('restore-all')->middleware('permission:Contact Restore All');
Route::any('delete-permanent-all', ContactDeletePermanentAll::class)->name('delete-permanent-all')->middleware('permission:Contact Delete Permanent All');
