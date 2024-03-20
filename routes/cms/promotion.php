<?php

use App\Livewire\CMS\Promotion\PromotionActive;
use App\Livewire\CMS\Promotion\PromotionAddPage;
use App\Livewire\CMS\Promotion\PromotionClonePage;
use App\Livewire\CMS\Promotion\PromotionDelete;
use App\Livewire\CMS\Promotion\PromotionDeleteImage;
use App\Livewire\CMS\Promotion\PromotionDeletePermanent;
use App\Livewire\CMS\Promotion\PromotionDeletePermanentAll;
use App\Livewire\CMS\Promotion\PromotionEditPage;
use App\Livewire\CMS\Promotion\PromotionPage;
use App\Livewire\CMS\Promotion\PromotionRestore;
use App\Livewire\CMS\Promotion\PromotionRestoreAll;
use App\Livewire\CMS\Promotion\PromotionTrashPage;
use App\Livewire\CMS\Promotion\PromotionViewPage;

Route::any('', PromotionPage::class)->name('index')->middleware('permission:Promotion');
Route::any('add', PromotionAddPage::class)->name('add')->middleware('permission:Promotion Add');
Route::any('clone/{promotion}', PromotionClonePage::class)->name('clone')->middleware('permission:Promotion Clone');
Route::any('edit/{promotion}', PromotionEditPage::class)->name('edit')->middleware('permission:Promotion Edit');
Route::any('delete/{promotion}', PromotionDelete::class)->name('delete')->middleware('permission:Promotion Delete');
Route::any('delete-image/{promotion}', PromotionDeleteImage::class)->name('delete-image')->middleware('permission:Promotion Edit');
Route::any('active/{promotion}', PromotionActive::class)->name('active')->middleware('permission:Promotion Active');
Route::any('view/{promotion}', PromotionViewPage::class)->name('view')->middleware('permission:Promotion View');
Route::any('trash', PromotionTrashPage::class)->name('trash')->middleware('permission:Promotion Trash');
Route::any('restore/{promotion}', PromotionRestore::class)->name('restore')->middleware('permission:Promotion Restore');
Route::any('delete-permanent/{promotion}', PromotionDeletePermanent::class)->name('delete-permanent')->middleware('permission:Promotion Delete Permanent');
Route::any('restore-all', PromotionRestoreAll::class)->name('restore-all')->middleware('permission:Promotion Restore All');
Route::any('delete-permanent-all', PromotionDeletePermanentAll::class)->name('delete-permanent-all')->middleware('permission:Promotion Delete Permanent All');
