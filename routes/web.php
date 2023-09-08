<?php

use App\Livewire\Home\HomePage;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::any('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);

    return redirect()->back()->withInfo(trans('index.language_has_been_changed'));
})->name('locale');

Route::any('', HomePage::class)->name('index');
