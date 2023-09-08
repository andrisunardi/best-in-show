<?php

use App\Livewire\CMS\ForgotPassword\ForgotPasswordPage;
use App\Livewire\CMS\Home\HomePage;
use App\Livewire\CMS\Login\LoginPage;
use App\Livewire\CMS\Logout;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::any('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    App::setLocale($locale);

    return redirect()->back();
})->name('locale');

Route::any('login', LoginPage::class)->name('login');
Route::any('forgot-password', ForgotPasswordPage::class)->name('forgot-password');

Route::group(['middleware' => ['auth', 'role:'.config('app.route_cms_roles')]], function () {
    Route::any('', HomePage::class)->name('index');

    Route::prefix('configuration')->name('configuration.')->as('configuration.')
        ->middleware(['role:Super User|Configuration'])
        ->group(base_path('routes/cms/configuration.php'));

    Route::prefix('profile')->name('profile.')->as('profile.')
        ->group(base_path('routes/cms/profile.php'));

    Route::any('logout', Logout::class)->name('logout');
});
