<?php

use App\Livewire\CMS\SignUp\SignUpActive;
use App\Livewire\CMS\SignUp\SignUpAddPage;
use App\Livewire\CMS\SignUp\SignUpClonePage;
use App\Livewire\CMS\SignUp\SignUpDelete;
use App\Livewire\CMS\SignUp\SignUpDeletePermanent;
use App\Livewire\CMS\SignUp\SignUpDeletePermanentAll;
use App\Livewire\CMS\SignUp\SignUpEditPage;
use App\Livewire\CMS\SignUp\SignUpPage;
use App\Livewire\CMS\SignUp\SignUpRestore;
use App\Livewire\CMS\SignUp\SignUpRestoreAll;
use App\Livewire\CMS\SignUp\SignUpTrashPage;
use App\Livewire\CMS\SignUp\SignUpViewPage;
use Illuminate\Support\Facades\Route;

Route::any('', SignUpPage::class)->name('index')->middleware('permission:Sign Up');
Route::any('add', SignUpAddPage::class)->name('add')->middleware('permission:Sign Up Add');
Route::any('clone/{signUp}', SignUpClonePage::class)->name('clone')->middleware('permission:Sign Up Clone');
Route::any('edit/{signUp}', SignUpEditPage::class)->name('edit')->middleware('permission:Sign Up Edit');
Route::any('delete/{signUp}', SignUpDelete::class)->name('delete')->middleware('permission:Sign Up Delete');
Route::any('active/{signUp}', SignUpActive::class)->name('active')->middleware('permission:Sign Up Active');
Route::any('view/{signUp}', SignUpViewPage::class)->name('view')->middleware('permission:Sign Up View');
Route::any('trash', SignUpTrashPage::class)->name('trash')->middleware('permission:Sign Up Trash');
Route::any('restore/{signUp}', SignUpRestore::class)->name('restore')->middleware('permission:Sign Up Restore');
Route::any('delete-permanent/{signUp}', SignUpDeletePermanent::class)->name('delete-permanent')->middleware('permission:Sign Up Delete Permanent');
Route::any('restore-all', SignUpRestoreAll::class)->name('restore-all')->middleware('permission:Sign Up Restore All');
Route::any('delete-permanent-all', SignUpDeletePermanentAll::class)->name('delete-permanent-all')->middleware('permission:Sign Up Delete Permanent All');
