<?php

use App\Livewire\AboutUs\AboutUsPage;
use App\Livewire\Article\ArticlePage;
use App\Livewire\Article\ArticleViewPage;
use App\Livewire\ContactUs\ContactUsPage;
use App\Livewire\DisplayContest\DisplayContestPage;
use App\Livewire\Event\EventPage;
use App\Livewire\Event\EventViewPage;
use App\Livewire\Faq\FaqPage;
use App\Livewire\Home\HomePage;
use App\Livewire\OurCompany\OurCompanyPage;
use App\Livewire\Pet\PetPage;
use App\Livewire\Pet\PetViewPage;
use App\Livewire\Product\ProductPage;
use App\Livewire\Product\ProductViewPage;
use App\Livewire\Promotion\PromotionPage;
use App\Livewire\Promotion\PromotionViewPage;
use App\Livewire\Search\SearchPage;
use App\Livewire\WantToOpenAOnlineShop\WantToOpenAOnlineShopPage;
use App\Livewire\WantToOpenAPetShop\WantToOpenAPetShopPage;
use App\Livewire\WhereToBuy\WhereToBuyPage;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::any('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);

    return redirect()->back()->withInfo(trans('index.language_has_been_changed'));
})->name('locale');

Route::any('', HomePage::class)->name('index');
Route::any('about-us', AboutUsPage::class)->name('about-us');
Route::any('contact-us', ContactUsPage::class)->name('contact-us');
Route::any('our-company', OurCompanyPage::class)->name('our-company');

Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
    Route::any('', ProductPage::class)->name('index');
    Route::any('{slug}', ProductViewPage::class)->name('view');
});

Route::group(['prefix' => 'event', 'as' => 'event.'], function () {
    Route::any('', EventPage::class)->name('index');
    Route::any('{slug}', EventViewPage::class)->name('view');
});

Route::group(['prefix' => 'promotion', 'as' => 'promotion.'], function () {
    Route::any('', PromotionPage::class)->name('index');
    Route::any('{slug}', PromotionViewPage::class)->name('view');
});

Route::group(['prefix' => 'article', 'as' => 'article.'], function () {
    Route::any('', ArticlePage::class)->name('index');
    Route::any('{slug}', ArticleViewPage::class)->name('view');
});

Route::group(['prefix' => 'pet', 'as' => 'pet.'], function () {
    Route::any('', PetPage::class)->name('index');
    Route::any('{slug}', PetViewPage::class)->name('view');
});

Route::any('faq', FaqPage::class)->name('faq');
Route::any('want-to-open-a-pet-shop', WantToOpenAPetShopPage::class)->name('want-to-open-a-pet-shop');
Route::any('want-to-open-a-online-shop', WantToOpenAOnlineShopPage::class)->name('want-to-open-a-online-shop');
Route::any('where-to-buy', WhereToBuyPage::class)->name('where-to-buy');
Route::any('search', SearchPage::class)->name('search');

Route::any('displaycontest', DisplayContestPage::class)->name('displaycontest');

//         $prefix = "Event";
//         Route::group(["prefix" => Str::slug($prefix), "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//             $controller = Str::studly($prefix) . "Controller";
//             Route::any("", $controller . "@index")->name("index");
//             Route::any("add", $controller . "@add")->name("add");
//             Route::any("edit/{id}", $controller . "@edit")->name("edit");
//             Route::any("delete/{id}", $controller . "@delete")->name("delete");
//             Route::any("trash", $controller . "@trash")->name("trash");
//             Route::any("restore-all", $controller . "@restore_all")->name("restore-all");
//             Route::any("restore/{id}", $controller . "@restore")->name("restore");
//             Route::any("delete-permanent-all", $controller . "@delete_permanent_all")->name("delete-permanent-all");
//             Route::any("delete-permanent/{id}", $controller . "@delete_permanent")->name("delete-permanent");
//         });

//         $prefix = "Event Image";
//         Route::group(["prefix" => Str::slug($prefix), "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//             $controller = Str::studly($prefix) . "Controller";
//             Route::any("", $controller . "@index")->name("index");
//             Route::any("add", $controller . "@add")->name("add");
//             Route::any("edit/{id}", $controller . "@edit")->name("edit");
//             Route::any("delete/{id}", $controller . "@delete")->name("delete");
//             Route::any("trash", $controller . "@trash")->name("trash");
//             Route::any("restore-all", $controller . "@restore_all")->name("restore-all");
//             Route::any("restore/{id}", $controller . "@restore")->name("restore");
//             Route::any("delete-permanent-all", $controller . "@delete_permanent_all")->name("delete-permanent-all");
//             Route::any("delete-permanent/{id}", $controller . "@delete_permanent")->name("delete-permanent");
//         });

//         $prefix = "Event Video";
//         Route::group(["prefix" => Str::slug($prefix), "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//             $controller = Str::studly($prefix) . "Controller";
//             Route::any("", $controller . "@index")->name("index");
//             Route::any("add", $controller . "@add")->name("add");
//             Route::any("edit/{id}", $controller . "@edit")->name("edit");
//             Route::any("delete/{id}", $controller . "@delete")->name("delete");
//             Route::any("trash", $controller . "@trash")->name("trash");
//             Route::any("restore-all", $controller . "@restore_all")->name("restore-all");
//             Route::any("restore/{id}", $controller . "@restore")->name("restore");
//             Route::any("delete-permanent-all", $controller . "@delete_permanent_all")->name("delete-permanent-all");
//             Route::any("delete-permanent/{id}", $controller . "@delete_permanent")->name("delete-permanent");
//         });

//         $prefix = "Promotion";
//         Route::group(["prefix" => Str::slug($prefix), "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//             $controller = Str::studly($prefix) . "Controller";
//             Route::any("", $controller . "@index")->name("index");
//             Route::any("add", $controller . "@add")->name("add");
//             Route::any("edit/{id}", $controller . "@edit")->name("edit");
//             Route::any("delete/{id}", $controller . "@delete")->name("delete");
//             Route::any("trash", $controller . "@trash")->name("trash");
//             Route::any("restore-all", $controller . "@restore_all")->name("restore-all");
//             Route::any("restore/{id}", $controller . "@restore")->name("restore");
//             Route::any("delete-permanent-all", $controller . "@delete_permanent_all")->name("delete-permanent-all");
//             Route::any("delete-permanent/{id}", $controller . "@delete_permanent")->name("delete-permanent");
//         });

//         $prefix = "Product Type";
//         Route::group(["prefix" => Str::slug($prefix), "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//             $controller = Str::studly($prefix) . "Controller";
//             Route::any("", $controller . "@index")->name("index");
//             Route::any("add", $controller . "@add")->name("add");
//             Route::any("edit/{id}", $controller . "@edit")->name("edit");
//             Route::any("delete/{id}", $controller . "@delete")->name("delete");
//             Route::any("trash", $controller . "@trash")->name("trash");
//             Route::any("restore-all", $controller . "@restore_all")->name("restore-all");
//             Route::any("restore/{id}", $controller . "@restore")->name("restore");
//             Route::any("delete-permanent-all", $controller . "@delete_permanent_all")->name("delete-permanent-all");
//             Route::any("delete-permanent/{id}", $controller . "@delete_permanent")->name("delete-permanent");
//         });

//         $prefix = "Product Category";
//         Route::group(["prefix" => Str::slug($prefix), "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//             $controller = Str::studly($prefix) . "Controller";
//             Route::any("", $controller . "@index")->name("index");
//             Route::any("add", $controller . "@add")->name("add");
//             Route::any("edit/{id}", $controller . "@edit")->name("edit");
//             Route::any("delete/{id}", $controller . "@delete")->name("delete");
//             Route::any("trash", $controller . "@trash")->name("trash");
//             Route::any("restore-all", $controller . "@restore_all")->name("restore-all");
//             Route::any("restore/{id}", $controller . "@restore")->name("restore");
//             Route::any("delete-permanent-all", $controller . "@delete_permanent_all")->name("delete-permanent-all");
//             Route::any("delete-permanent/{id}", $controller . "@delete_permanent")->name("delete-permanent");
//         });

//         $prefix = "Product";
//         Route::group(["prefix" => Str::slug($prefix), "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//             $controller = Str::studly($prefix) . "Controller";
//             Route::any("", $controller . "@index")->name("index");
//             Route::any("add", $controller . "@add")->name("add");
//             Route::any("edit/{id}", $controller . "@edit")->name("edit");
//             Route::any("delete/{id}", $controller . "@delete")->name("delete");
//             Route::any("trash", $controller . "@trash")->name("trash");
//             Route::any("restore-all", $controller . "@restore_all")->name("restore-all");
//             Route::any("restore/{id}", $controller . "@restore")->name("restore");
//             Route::any("delete-permanent-all", $controller . "@delete_permanent_all")->name("delete-permanent-all");
//             Route::any("delete-permanent/{id}", $controller . "@delete_permanent")->name("delete-permanent");
//         });
