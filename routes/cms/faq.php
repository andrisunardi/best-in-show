<?php

use App\Livewire\CMS\Faq\FaqActive;
use App\Livewire\CMS\Faq\FaqAddPage;
use App\Livewire\CMS\Faq\FaqClonePage;
use App\Livewire\CMS\Faq\FaqDelete;
use App\Livewire\CMS\Faq\FaqDeletePermanent;
use App\Livewire\CMS\Faq\FaqDeletePermanentAll;
use App\Livewire\CMS\Faq\FaqEditPage;
use App\Livewire\CMS\Faq\FaqPage;
use App\Livewire\CMS\Faq\FaqRestore;
use App\Livewire\CMS\Faq\FaqRestoreAll;
use App\Livewire\CMS\Faq\FaqTrashPage;
use App\Livewire\CMS\Faq\FaqViewPage;
use Illuminate\Support\Facades\Route;

Route::any('', FaqPage::class)->name('index')->middleware('permission:Faq');
Route::any('add', FaqAddPage::class)->name('add')->middleware('permission:Faq Add');
Route::any('clone/{faq}', FaqClonePage::class)->name('clone')->middleware('permission:Faq Clone');
Route::any('edit/{faq}', FaqEditPage::class)->name('edit')->middleware('permission:Faq Edit');
Route::any('active/{faq}', FaqActive::class)->name('active')->middleware('permission:Faq Active');
Route::any('delete/{faq}', FaqDelete::class)->name('delete')->middleware('permission:Faq Delete');
Route::any('view/{faq}', FaqViewPage::class)->name('view')->middleware('permission:Faq View');
Route::any('trash', FaqTrashPage::class)->name('trash')->middleware('permission:Faq Trash');
Route::any('restore/{faq}', FaqRestore::class)->name('restore')->middleware('permission:Faq Restore');
Route::any('delete-permanent/{faq}', FaqDeletePermanent::class)->name('delete-permanent')->middleware('permission:Faq Delete Permanent');
Route::any('restore-all', FaqRestoreAll::class)->name('restore-all')->middleware('permission:Faq Restore All');
Route::any('delete-permanent-all', FaqDeletePermanentAll::class)->name('delete-permanent-all')->middleware('permission:Faq Delete Permanent All');
