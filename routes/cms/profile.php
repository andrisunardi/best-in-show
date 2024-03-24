<?php

use App\Livewire\CMS\Profile\ActivityLogPage;
use App\Livewire\CMS\Profile\ChangePasswordPage;
use App\Livewire\CMS\Profile\EditProfilePage;
use App\Livewire\CMS\Profile\ProfilePage;
use Illuminate\Support\Facades\Route;

Route::any('', ProfilePage::class)->name('index');
Route::any('activity-log', ActivityLogPage::class)->name('activity-log');
Route::any('edit-profile', EditProfilePage::class)->name('edit-profile');
Route::any('change-password', ChangePasswordPage::class)->name('change-password');
