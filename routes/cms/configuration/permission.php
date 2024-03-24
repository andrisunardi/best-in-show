<?php

use App\Livewire\CMS\Configuration\Permission\PermissionAddPage;
use App\Livewire\CMS\Configuration\Permission\PermissionClonePage;
use App\Livewire\CMS\Configuration\Permission\PermissionDelete;
use App\Livewire\CMS\Configuration\Permission\PermissionEditPage;
use App\Livewire\CMS\Configuration\Permission\PermissionPage;
use App\Livewire\CMS\Configuration\Permission\PermissionViewPage;
use Illuminate\Support\Facades\Route;

Route::any('', PermissionPage::class)->name('index')->middleware('permission:Permission');
Route::any('add', PermissionAddPage::class)->name('add')->middleware('permission:Permission Add');
Route::any('clone/{permission}', PermissionClonePage::class)->name('clone')->middleware('permission:Permission Clone');
Route::any('edit/{permission}', PermissionEditPage::class)->name('edit')->middleware('permission:Permission Edit');
Route::any('delete/{permission}', PermissionDelete::class)->name('delete')->middleware('permission:Permission Delete');
Route::any('view/{permission}', PermissionViewPage::class)->name('view')->middleware('permission:Permission View');
