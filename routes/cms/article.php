<?php

use App\Livewire\CMS\Article\ArticleActive;
use App\Livewire\CMS\Article\ArticleAddPage;
use App\Livewire\CMS\Article\ArticleClonePage;
use App\Livewire\CMS\Article\ArticleDelete;
use App\Livewire\CMS\Article\ArticleDeleteImage;
use App\Livewire\CMS\Article\ArticleDeletePermanent;
use App\Livewire\CMS\Article\ArticleDeletePermanentAll;
use App\Livewire\CMS\Article\ArticleEditPage;
use App\Livewire\CMS\Article\ArticlePage;
use App\Livewire\CMS\Article\ArticleRestore;
use App\Livewire\CMS\Article\ArticleRestoreAll;
use App\Livewire\CMS\Article\ArticleTrashPage;
use App\Livewire\CMS\Article\ArticleViewPage;

Route::any('', ArticlePage::class)->name('index')->middleware('permission:Article');
Route::any('add', ArticleAddPage::class)->name('add')->middleware('permission:Article Add');
Route::any('clone/{article}', ArticleClonePage::class)->name('clone')->middleware('permission:Article Clone');
Route::any('edit/{article}', ArticleEditPage::class)->name('edit')->middleware('permission:Article Edit');
Route::any('delete/{article}', ArticleDelete::class)->name('delete')->middleware('permission:Article Delete');
Route::any('delete-image/{article}', ArticleDeleteImage::class)->name('delete-image')->middleware('permission:Article Edit');
Route::any('active/{article}', ArticleActive::class)->name('active')->middleware('permission:Article Active');
Route::any('view/{article}', ArticleViewPage::class)->name('view')->middleware('permission:Article View');
Route::any('trash', ArticleTrashPage::class)->name('trash')->middleware('permission:Article Trash');
Route::any('restore/{article}', ArticleRestore::class)->name('restore')->middleware('permission:Article Restore');
Route::any('delete-permanent/{article}', ArticleDeletePermanent::class)->name('delete-permanent')->middleware('permission:Article Delete Permanent');
Route::any('restore-all', ArticleRestoreAll::class)->name('restore-all')->middleware('permission:Article Restore All');
Route::any('delete-permanent-all', ArticleDeletePermanentAll::class)->name('delete-permanent-all')->middleware('permission:Article Delete Permanent All');
