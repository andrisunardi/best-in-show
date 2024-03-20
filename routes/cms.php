<?php

use App\Livewire\CMS\ForgotPassword\ForgotPasswordPage;
use App\Livewire\CMS\Home\HomePage;
use App\Livewire\CMS\Login\LoginPage;
use App\Livewire\CMS\Logout;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::any('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    App::setLocale($locale);

    return redirect()->back();
})->name('locale');

Route::any('login', LoginPage::class)->name('login');
Route::any('forgot-password', ForgotPasswordPage::class)->name('forgot-password');

Route::group(['middleware' => ['auth', 'role:'.config('app.route_cms_roles')]], function () {
    Route::any('', HomePage::class)->name('index');

    Route::prefix('contact')->name('contact.')->as('contact.')
        ->middleware(['role:Super User|Admin|Contact'])
        ->group(base_path('routes/cms/contact.php'));

    Route::prefix('sign-up')->name('sign-up.')->as('sign-up.')
        ->middleware(['role:Super User|Admin|Sign Up'])
        ->group(base_path('routes/cms/sign-up.php'));

    Route::prefix('article')->name('article.')->as('article.')
        ->middleware(['role:Super User|Admin|Article'])
        ->group(base_path('routes/cms/article.php'));

    Route::prefix('event')->name('event.')->as('event.')
        ->middleware(['role:Super User|Admin|Event'])
        ->group(base_path('routes/cms/event.php'));

    // Route::prefix('event-image')->name('event-image.')->as('event-image.')
    //     ->middleware(['role:Super User|Admin|Event Image'])
    //     ->group(base_path('routes/cms/event-image.php'));

    // Route::prefix('event-video')->name('event-video.')->as('event-video.')
    //     ->middleware(['role:Super User|Admin|Event Video'])
    //     ->group(base_path('routes/cms/event-video.php'));

    Route::prefix('promotion')->name('promotion.')->as('promotion.')
        ->middleware(['role:Super User|Admin|Promotion'])
        ->group(base_path('routes/cms/promotion.php'));

    Route::prefix('banner')->name('banner.')->as('banner.')
        ->middleware(['role:Super User|Admin|Banner'])
        ->group(base_path('routes/cms/banner.php'));

    Route::prefix('slider')->name('slider.')->as('slider.')
        ->middleware(['role:Super User|Admin|Slider'])
        ->group(base_path('routes/cms/slider.php'));

    Route::prefix('store')->name('store.')->as('store.')
        ->middleware(['role:Super User|Admin|Slider'])
        ->group(base_path('routes/cms/store.php'));

    Route::prefix('faq')->name('faq.')->as('faq.')
        ->middleware(['role:Super User|Admin|Faq'])
        ->group(base_path('routes/cms/faq.php'));

    Route::prefix('pet')->name('pet.')->as('pet.')
        ->middleware(['role:Super User|Admin|Contact'])
        ->group(base_path('routes/cms/pet.php'));

    Route::prefix('configuration')->name('configuration.')->as('configuration.')
        ->middleware(['role:Super User|Configuration'])
        ->group(base_path('routes/cms/configuration.php'));

    Route::prefix('profile')->name('profile.')->as('profile.')
        ->group(base_path('routes/cms/profile.php'));

    Route::any('logout', Logout::class)->name('logout');
});
