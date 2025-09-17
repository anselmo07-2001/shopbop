<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Admin\WebsiteSettingsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Models\Product;
use Illuminate\Support\Facades\Route;


Route::get("/", [PageController::class, "index"])->name("home");
Route::get("/faq", [FaqController::class, "faq"])->name("faq");
Route::get("/contactUs", [ContactUsController::class, "contactUs"])->name("contactUs");
Route::get("/aboutUs", [AboutUsController::class, "aboutUs"])->name("aboutUs");
Route::get("/cart", [CartController::class, "cart"])->name("cart");

Route::middleware("guest:customer")->group(function () {
    Route::get("/login", [LoginController::class, "login"])->name("login");
    Route::post("/login", [LoginController::class, "loginCustomer"])->name("login.customer");

    Route::get("/register", [RegisterController::class, "register"])->name("register");
    Route::post("/store", [RegisterController::class, "store"])->name("register.store");
});

Route::post("/logout", [LoginController::class, "logoutCustomer"])->name("logout.customer");

Route::get("/level/{level}/category/{id}/value/{value}", [CategoryController::class, "index"])->name("category.index");

Route::get("/products/{id}", [ProductController::class, "show"])->name("product.show");
Route::get("/search", [ProductController::class, "search"])->name("product.search");

Route::get("/cart", [CartController::class, "index"])->name("cart.index");
Route::post("/cart/product/add/{id}", [CartController::class, "add"])->name("cart.add");
Route::delete("/cart/product/destroy/{id}", [CartController::class, "destroy"])->name("cart.destroy");
Route::post("/cart/product/update{id}", [CartController::class, "update"])->name("cart.update");

Route::middleware("auth:customer")->group(function() {
    Route::get("/checkout", [CheckoutController::class, "checkout"])->name("checkout.index");
    Route::delete("/checkout/{id}", [CheckoutController::class, "destroy"])->name("checkout.destroy");
    Route::post("/checkout/place-order", [CheckoutController::class, "placeOrder"])->name("checkout.placeOrder");
    
    Route::get("/dashboard", [Dashboard::class, "index"])->name("dashboard.index");
    Route::post("/dashboard/update-profile", [Dashboard::class, "updateProfile"])->name("dashboard.update-profile");
    Route::post("/dashboard/update-address", [Dashboard::class, "updateAddress"])->name("dashboard.update-address");
    Route::post("/dashboard/update-password", [Dashboard::class, "updatePassword"])->name("dashboard.update-password");
});



Route::get("/admin", [LoginController::class, "loginAdmin"])->name("login.admin");
Route::post("/admin", [LoginController::class, "handleLoginAdmin"])->name("handle.login.admin");

Route::get("/admin/dashboard", [AdminController::class, "dashboard"])->name("admin.dashboard");
Route::get("/admin/edit-profile", [AdminController::class, "editProfile"])->name("admin.editProfile");


Route::get("/admin/website-setting", [WebsiteSettingsController::class, "websiteSetting"])->name("admin.websiteSetting");
Route::post("/admin/website-setting/branding-update", [WebsiteSettingsController::class, "updateBranding"])->name("admin.branding.update");
Route::post("/admin/website-setting/footer-update", [WebsiteSettingsController::class, "updateFooter"])->name("admin.footer.update");
Route::post("/admin/website-setting/message-settings-update", [WebsiteSettingsController::class, "updateMessageSettings"])->name("admin.messageSettings.update");
Route::post("/admin/website-setting/products-display-limit", [WebsiteSettingsController::class, "updateProductsDisplayLimit"])->name("admin.productsDisplayLimit.update");
Route::post("/admin/website-setting/home-settings", [WebsiteSettingsController::class, "updateHomeSettings"])->name("admin.homeSettings.update");
Route::post("/admin/website-setting/payment", [WebsiteSettingsController::class, "updatePayment"])->name("admin.payment.update");


Route::get("/admin/shop-setting/size", [AdminController::class, "size"])->name("admin.shopSetting.size");
Route::get("/admin/shop-setting/color", [AdminController::class, "color"])->name("admin.shopSetting.color");
Route::get("/admin/shop-setting/country", [AdminController::class, "country"])->name("admin.shopSetting.country");
Route::get("/admin/shop-setting/shipping-cost", [AdminController::class, "shippingCost"])->name("admin.shopSetting.shippingCost");
Route::get("/admin/shop-setting/top-level-category", [AdminController::class, "topLevelCategory"])->name("admin.shopSetting.topLevelCategory");
Route::get("/admin/shop-setting/mid-level-category", [AdminController::class, "midLevelCategory"])->name("admin.shopSetting.midLevelCategory");
Route::get("/admin/shop-setting/end-level-category", [AdminController::class, "endLevelCategory"])->name("admin.shopSetting.endLevelCategory");

Route::get("/admin/product-management", [AdminController::class, "productManagement"])->name("admin.productManagement");
Route::get("/admin/order-management", [AdminController::class, "orderManagement"])->name("admin.orderManagement");
Route::get("/admin/manage-sliders", [AdminController::class, "manageSliders"])->name("admin.manageSliders");
Route::get("/admin/services", [AdminController::class, "services"])->name("admin.services");
Route::get("/admin/faq", [AdminController::class, "faq"])->name("admin.faq");
Route::get("/admin/registered-customers", [AdminController::class, "registeredCustomers"])->name("admin.registeredCustomers");
Route::get("/admin/page-settings", [AdminController::class, "pageSettings"])->name("admin.pageSettings");
Route::get("/admin/social-media", [AdminController::class, "socialMedia"])->name("admin.socialMedia");
Route::get("/admin/subscriber", [AdminController::class, "subscriber"])->name("admin.subscriber");


