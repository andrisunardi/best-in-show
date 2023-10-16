<?php

use App\Livewire\Home\HomePage;
// use App\Livewire\AboutUs\AboutUsPage;
// use App\Livewire\OurCompany\OurCompanyPage;
// use App\Livewire\Product\ProductPage;
// use App\Livewire\Product\ProductViewPage;
// use App\Livewire\Event\EventPage;
// use App\Livewire\Event\EventViewPage;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::any('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);

    return redirect()->back()->withInfo(trans('index.language_has_been_changed'));
})->name('locale');

Route::any('', HomePage::class)->name('index');
// Route::any('displaycontest', HomePage::class)->name('displaycontest');
// Route::any('about-us', AboutUsPage::class)->name('about-us');
// Route::any('our-company', OurCompanyPage::class)->name('our-company');

// Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
//     Route::any('', ProductPage::class)->name('index');
//     Route::any('{slug}', ProductViewPage::class)->name('view');
// });

// Route::group(['prefix' => 'event', 'as' => 'event.'], function () {
//     Route::any('', EventPage::class)->name('index');
//     Route::any('{slug}', EventViewPage::class)->name('view');
// });

// Route::group(['prefix' => 'promotion', 'as' => 'promotion.'], function () {
//     Route::any('', PromotionPage::class)->name('index');
//     Route::any('{slug}', PromotionViewPage::class)->name('view');
// });

// Route::any('faq', FaqPage::class)->name('faq');
// Route::any('want-to-open-a-pet-shop', WantToOpenAPetShopPage::class)->name('want-to-open-a-pet-shop');
// Route::any('faq', FaqPage::class)->name('faq');

//     $prefix = "Want To Open A Pet Shop";
//     Route::group(["prefix" => Str::slug($prefix), "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//         $controller = Str::studly($prefix) . "Controller";
//         Route::any("", $controller . "@index")->name("index");
//     });

//     $prefix = "Want To Open A Online Shop";
//     Route::group(["prefix" => Str::slug($prefix), "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//         $controller = Str::studly($prefix) . "Controller";
//         Route::any("", $controller . "@index")->name("index");
//     });

//     $prefix = "About";
//     Route::group(["prefix" => Str::slug($prefix), "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//         $controller = Str::studly($prefix) . "Controller";
//         Route::any("", $controller . "@index")->name("index");
//     });

//     $prefix = "Portfolio";
//     Route::group(["prefix" => Str::slug($prefix), "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//         $controller = Str::studly($prefix) . "Controller";
//         Route::any("", $controller . "@index")->name("index");
//     });

//     $prefix = "Services";
//     Route::group(["prefix" => Str::slug($prefix), "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//         $controller = Str::studly($prefix) . "Controller";
//         Route::any("", $controller . "@index")->name("index");
//     });

//     $prefix = "Clients";
//     Route::group(["prefix" => Str::slug($prefix), "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//         $controller = Str::studly($prefix) . "Controller";
//         Route::any("", $controller . "@index")->name("index");
//     });

//     $prefix = "Blog";
//     Route::group(["prefix" => Str::slug($prefix), "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//         $controller = Str::studly($prefix) . "Controller";
//         Route::any("", $controller . "@index")->name("index");
//         Route::any("{blog_slug}", $controller . "@view")->name("view");
//     });

//     $prefix = "Careers";
//     Route::group(["prefix" => Str::slug($prefix), "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//         $controller = Str::studly($prefix) . "Controller";
//         Route::any("", $controller . "@index")->name("index");
//     });

//     $prefix = "Contact";
//     Route::group(["prefix" => Str::slug($prefix), "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//         $controller = Str::studly($prefix) . "Controller";
//         Route::any("", $controller . "@index")->name("index");
//     });

//     $prefix = "Where To Buy";
//     Route::group(["prefix" => Str::slug($prefix), "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//         $controller = Str::studly($prefix) . "Controller";
//         Route::any("", $controller . "@index")->name("index");
//     });

//     $prefix = "Search";
//     Route::group(["prefix" => Str::slug($prefix), "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//         $controller = Str::studly($prefix) . "Controller";
//         Route::any("", $controller . "@index")->name("index");
//     });

//     $prefix = "Pet";
//     Route::group(["prefix" => "{pet_slug}", "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//         $controller = Str::studly($prefix) . "Controller";
//         Route::any("", $controller . "@index")->name("index");

//         $prefix = "Product";
//         Route::group(["prefix" => Str::slug($prefix), "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//             $controller = Str::studly($prefix) . "Controller";
//             Route::any("", $controller . "@all")->name("all");
//         });

//         $prefix = "Product Type";
//         Route::group(["prefix" => "{product_type_slug}", "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//             $controller = Str::studly($prefix) . "Controller";
//             Route::any("", $controller . "@index")->name("index");

//             $prefix = "Product Category";
//             Route::group(["prefix" => "{product_category_slug}", "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//                 $controller = Str::studly($prefix) . "Controller";
//                 Route::any("", $controller . "@index")->name("index");

//                 $prefix = "Product";
//                 Route::group(["prefix" => "{product_slug}", "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//                     $controller = Str::studly($prefix) . "Controller";
//                     Route::any("", $controller . "@index")->name("index");
//                 });
//             });
//         });
//     });
// });

// $prefix = "Ajax";
// Route::group(["prefix" => Str::slug($prefix), "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//     $controller = Str::studly($prefix) . "Controller";
//     Route::any("pet/{pet_id}", $controller . "@pet")->name("pet");
//     Route::any("product-type/{product_type_id}", $controller . "@product_type")->name("product-type");
//     Route::any("product-category/{product_category_id}", $controller . "@product_category")->name("product-category");
//     Route::any("product/{product_name}", $controller . "@product")->name("product");
// });

// Route::group(["prefix" => Str::substr(Request::url(), 7, 9) == "localhost" || Str::substr(Request::url(), 7, 9) == "127.0.0.1" ? "displaycontest" : "", "namespace" => "DisplayContest", "as" => "displaycontest.", "domain" => Str::substr(Request::url(), 7, 9) == "localhost" || Str::substr(Request::url(), 7, 9) == "127.0.0.1" ? "" : "www.displaycontest." . env("APP_DOMAIN")], function () {
//     $prefix = "Home";
//     Route::group(["prefix" => $prefix == "Home" ? "" : Str::slug($prefix), "as" => $prefix == "Home" ? "" : Str::slug($prefix)], function () use ($prefix) {
//         $controller = Str::studly($prefix) . "Controller";
//         Route::any("", $controller . "@index")->name("index");
//     });
// });

// Route::group(["prefix" => Str::substr(Request::url(), 7, 9) == "localhost" || Str::substr(Request::url(), 7, 9) == "127.0.0.1" ? "cms" : "", "namespace" => "CMS", "as" => "cms.", "domain" => Str::substr(Request::url(), 7, 9) == "localhost" || Str::substr(Request::url(), 7, 9) == "127.0.0.1" ? "" : "www.cms." . env("APP_DOMAIN")], function () {
//     $prefix = "Login";
//     Route::group(["prefix" => Str::slug($prefix), "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//         $controller = Str::studly($prefix) . "Controller";
//         Route::any("", $controller . "@index")->name("index");
//     });

//     $prefix = "Forgot Password";
//     Route::group(["prefix" => Str::slug($prefix), "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//         $controller = Str::studly($prefix) . "Controller";
//         Route::any("", $controller . "@index")->name("index");
//     });

//     Route::group(["middleware" => "auth:user"], function () {

//         $prefix = "Dashboard";
//         Route::group(["prefix" => $prefix == "Dashboard" ? "" : Str::slug($prefix), "as" => $prefix == "Dashboard" ? "" : Str::slug($prefix)], function () use ($prefix) {
//             $controller = Str::studly($prefix) . "Controller";
//             Route::any("", $controller . "@index")->name("index");
//         });

//         $prefix = "Display Contest";
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
//             Route::any("export-to-excel", $controller . "@export_to_excel")->name("export-to-excel");
//         });

//         $prefix = "Sign Up";
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

//         $prefix = "Contact";
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

//         $prefix = "Store";
//         Route::group(["prefix" => Str::slug($prefix), "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//             $controller = Str::studly($prefix) . "Controller";
//             Route::any("", $controller . "@index")->name("index");
//             Route::any("add", $controller . "@add")->name("add");
//             Route::any("view/{id}", $controller . "@view")->name("view");
//             Route::any("edit/{id}", $controller . "@edit")->name("edit");
//             Route::any("delete/{id}", $controller . "@delete")->name("delete");
//             Route::any("trash", $controller . "@trash")->name("trash");
//             Route::any("restore-all", $controller . "@restore_all")->name("restore-all");
//             Route::any("restore/{id}", $controller . "@restore")->name("restore");
//             Route::any("delete-permanent-all", $controller . "@delete_permanent_all")->name("delete-permanent-all");
//             Route::any("delete-permanent/{id}", $controller . "@delete_permanent")->name("delete-permanent");
//         });

//         // $prefix = "Faq";
//         // Route::group(["prefix" => Str::slug($prefix), "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//         //     $controller = Str::studly($prefix) . "Controller";
//         //     Route::any("", $controller . "@index")->name("index");
//         //     Route::any("add", $controller . "@add")->name("add");
//         //     Route::any("edit/{id}", $controller . "@edit")->name("edit");
//         //     Route::any("delete/{id}", $controller . "@delete")->name("delete");
//         //     Route::any("trash", $controller . "@trash")->name("trash");
//         //     Route::any("restore-all", $controller . "@restore_all")->name("restore-all");
//         //     Route::any("restore/{id}", $controller . "@restore")->name("restore");
//         //     Route::any("delete-permanent-all", $controller . "@delete_permanent_all")->name("delete-permanent-all");
//         //     Route::any("delete-permanent/{id}", $controller . "@delete_permanent")->name("delete-permanent");
//         // });

//         $prefix = "User";
//         Route::group(["prefix" => Str::slug($prefix), "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//             $controller = Str::studly($prefix) . "Controller";
//             Route::any("", $controller . "@index")->name("index");
//             Route::any("add", $controller . "@add")->name("add");
//             Route::any("view/{id}", $controller . "@view")->name("view");
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

//         $prefix = "Pet";
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

//         $prefix = "Banner";
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

//         $prefix = "Slider";
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

//         $prefix = "Profile";
//         Route::group(["prefix" => Str::slug($prefix), "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//             $controller = Str::studly($prefix) . "Controller";
//             Route::any("edit-profile", $controller . "@edit_profile")->name("edit-profile");
//             Route::any("change-password", $controller . "@change_password")->name("change-password");
//         });

//         $prefix = "Logout";
//         Route::group(["prefix" => Str::slug($prefix), "as" => Str::slug($prefix) . "."], function () use ($prefix) {
//             $controller = Str::studly($prefix) . "Controller";
//             Route::any("", $controller . "@index")->name("index");
//         });
//     });
// });
