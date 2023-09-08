<?php

use App\Http\Livewire\CMS\Profile\ActivityLogPage;
use App\Http\Livewire\CMS\Profile\ChangePasswordPage;
use App\Http\Livewire\CMS\Profile\EditProfilePage;
use App\Http\Livewire\CMS\Profile\ProfilePage;

Route::any('', ProfilePage::class)->name('index');
Route::any('activity-log', ActivityLogPage::class)->name('activity-log');
Route::any('edit-profile', EditProfilePage::class)->name('edit-profile');
Route::any('change-password', ChangePasswordPage::class)->name('change-password');
