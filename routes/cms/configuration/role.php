<?php

use App\Livewire\CMS\Configuration\Role\RoleAddPage;
use App\Livewire\CMS\Configuration\Role\RoleClonePage;
use App\Livewire\CMS\Configuration\Role\RoleDelete;
use App\Livewire\CMS\Configuration\Role\RoleEditPage;
use App\Livewire\CMS\Configuration\Role\RolePage;
use App\Livewire\CMS\Configuration\Role\RoleViewPage;
use Illuminate\Support\Facades\Route;

Route::any('', RolePage::class)->name('index')->middleware('permission:Role');
Route::any('add', RoleAddPage::class)->name('add')->middleware('permission:Role Add');
Route::any('clone/{role}', RoleClonePage::class)->name('clone')->middleware('permission:Role Clone');
Route::any('edit/{role}', RoleEditPage::class)->name('edit')->middleware('permission:Role Edit');
Route::any('delete/{role}', RoleDelete::class)->name('delete')->middleware('permission:Role Delete');
Route::any('view/{role}', RoleViewPage::class)->name('view')->middleware('permission:Role View');
