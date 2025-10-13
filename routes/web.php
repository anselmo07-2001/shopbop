<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\FAQManagementController;
use App\Http\Controllers\Admin\ManageSlidersController;
use App\Http\Controllers\Admin\ManageSubscribers;
use App\Http\Controllers\Admin\OrderManagementController;
use App\Http\Controllers\Admin\PageSettingsController;
use App\Http\Controllers\Admin\ProductManagementController;
use App\Http\Controllers\Admin\RegisteredCustomerManagementController;
use App\Http\Controllers\Admin\ServicesManagementController;
use App\Http\Controllers\Admin\ShopSettings\ColorController;
use App\Http\Controllers\Admin\ShopSettings\CountryController;
use App\Http\Controllers\Admin\ShopSettings\EndLevelCategoryController;
use App\Http\Controllers\Admin\ShopSettings\MidLevelCategoryController;
use App\Http\Controllers\Admin\ShopSettings\ShippingCostController;
use App\Http\Controllers\Admin\ShopSettings\ShippingCostsAllController;
use App\Http\Controllers\Admin\ShopSettings\SizeController;
use App\Http\Controllers\Admin\ShopSettings\TopLevelCategoryController;
use App\Http\Controllers\Admin\SocialMediaManagementController;
use App\Http\Controllers\Admin\WebsiteSettingsController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RatingsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SubscriberController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Models\Product;
use App\Models\Service;
use App\Models\ShippingCost;
use App\Models\ShippingCostAll;
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
    Route::post("/register/store", [RegisterController::class, "store"])->name("register.store");

    /* Reset password has a route naming convention */
    Route::get("/forgot-password", [ForgotPasswordController::class, "showLinkRequestForm"])->name("password.request");
    Route::post("/forgot-password", [ForgotPasswordController::class, "sendResetLinkEmail"])->name("password.email");

    Route::get("/reset-password/{token}", [ResetPasswordController::class, "showResetForm"])->name("password.reset");
    Route::post("/reset-password", [ResetPasswordController::class, "reset"])->name("password.update");
});


Route::post("/logout", [LoginController::class, "logoutCustomer"])->name("logout.customer");

Route::get("/level/{level}/category/{id}/value/{value}", [CategoryController::class, "index"])->name("category.index");

Route::get("/products/{id}", [ProductController::class, "show"])->name("product.show");

Route::post("/store", [RatingsController::class, "store"])->name("ratings.store");
Route::put("/{rating}/update", [RatingsController::class, "update"])->name("ratings.update");


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

Route::post("/subscriber", [SubscriberController::class, "store"])->name("newsletter.subscribe");
Route::get("/verify-subscriber/{hash}", [SubscriberController::class, "verify"])->name("newsletter.verify-subscription");


/************ Admin Panel **************/

Route::get("/admin/login", [LoginController::class, "loginAdmin"])->name("login.admin");
Route::post("/admin/login", [LoginController::class, "handleLoginAdmin"])->name("handle.login.admin");

Route::middleware("auth:admin")->group(function() {
    Route::post("/admin/logout", [LoginController::class, "hadnleLogoutAdmin"])->name("logout.admin");
});

Route::middleware("auth:admin")->group(function() {
    Route::get("/admin/dashboard", [AdminDashboardController::class, "dashboard"])->name("admin.dashboard");
});

Route::middleware("auth:admin")->group(function() {
    Route::prefix("/admin/manage-profile")->name("admin.manageProfile.")->group(function () {
        Route::get("/", [AdminController::class, "editProfile"])->name("editProfile");
        Route::put("/updateProfile", [AdminController::class, "updateProfile"])->name("updateProfile");
        Route::put("/updatePassword", [AdminController::class, "updatePassword"])->name("updatePassword");
    });
});

Route::middleware("auth:admin")->group(function() {
    Route::get("/admin/website-setting", [WebsiteSettingsController::class, "websiteSetting"])->name("admin.websiteSetting");
    Route::post("/admin/website-setting/branding-update", [WebsiteSettingsController::class, "updateBranding"])->name("admin.branding.update");
    Route::post("/admin/website-setting/footer-update", [WebsiteSettingsController::class, "updateFooter"])->name("admin.footer.update");
    Route::post("/admin/website-setting/message-settings-update", [WebsiteSettingsController::class, "updateMessageSettings"])->name("admin.messageSettings.update");
    Route::post("/admin/website-setting/products-display-limit", [WebsiteSettingsController::class, "updateProductsDisplayLimit"])->name("admin.productsDisplayLimit.update");
    Route::post("/admin/website-setting/home-settings", [WebsiteSettingsController::class, "updateHomeSettings"])->name("admin.homeSettings.update");
    Route::post("/admin/website-setting/payment", [WebsiteSettingsController::class, "updatePayment"])->name("admin.payment.update");
});

Route::middleware("auth:admin")->group(function() {
    Route::prefix("/admin/shop-setting/size")->name("admin.shopSetting.size.")->group(function () {
        Route::get("/", [SizeController::class, "index"])->name("index");
        Route::get("/create", [SizeController::class, "create"])->name("create");
        Route::post("/", [SizeController::class, "store"])->name("store");
        Route::get("/{size}/edit", [SizeController::class, "edit"])->name("edit");
        Route::put("/{size}", [SizeController::class, "update"])->name("update");
        Route::delete("/{size}", [SizeController::class, "destroy"])->name("destroy");
    });
});

Route::middleware("auth:admin")->group(function() {
    Route::prefix("/admin/shop-setting/color")->name("admin.shopSetting.color.")->group(function() {
        Route::get("/", [ColorController::class, "index"])->name("index");
        Route::get("/create", [ColorController::class, "create"])->name("create");
        Route::post("/", [ColorController::class, "store"])->name("store");
        Route::delete("/{color}", [ColorController::class, "destroy"])->name("destroy");
        Route::get("/{color}/edit", [ColorController::class, "edit"])->name("edit");
        Route::put("/{color}", [ColorController::class, "update"])->name("update");
    });
});

Route::middleware("auth:admin")->group(function() {
    Route::prefix("/admin/shop-setting/country")->name("admin.shopSetting.country.")->group(function() {
        Route::get("/", [CountryController::class, "index"])->name("index");
        Route::get("/create", [CountryController::class, "create"])->name("create");
        Route::post("/", [CountryController::class, "store"])->name("store");
        Route::delete("/{country}", [CountryController::class, "destroy"])->name("destroy");
        Route::get("/{country}/edit", [CountryController::class, "edit"])->name("edit");
        Route::put("/{country}", [CountryController::class, "update"])->name("update");
    });
});

Route::middleware("auth:admin")->group(function() {
    Route::prefix("/admin/shop-setting/shipping-cost")->name("admin.shopSetting.shippingCost.")->group(function() {
        Route::get("/", [ShippingCostController::class, "index"])->name("index");
        Route::post("/", [ShippingCostController::class, "store"])->name("store");
        Route::delete("/{country}", [ShippingCostController::class, "destroy"])->name("destroy");
        Route::get("/{shippingCost}/edit", [ShippingCostController::class, "edit"])->name("edit");
        Route::put("/{shippingCost}", [ShippingCostController::class, "update"])->name("update");
    });

    Route::put("/admin/shop-setting/shipping-costs-all", [ShippingCostsAllController::class, "update"])
        ->name("admin.shopSetting.shippingCostsAll.update");
});


Route::middleware("auth:admin")->group(function() {
    Route::prefix("/admin/shop-setting/top-level-category")->name("admin.shopSetting.topLevelCategory.")->group(function() {
        Route::get("/", [TopLevelCategoryController::class, "index"])->name("index");
        Route::get("/create", [TopLevelCategoryController::class, "create"])->name("create");
        Route::post("/", [TopLevelCategoryController::class, "store"])->name("store");
        Route::delete("/{topLevelCategory}", [TopLevelCategoryController::class, "destroy"])->name("destroy");
        Route::get("/{topLevelCategory}/edit", [TopLevelCategoryController::class, "edit"])->name("edit");
        Route::put("/{topLevelCategory}", [TopLevelCategoryController::class, "update"])->name("update");
    });
});

Route::middleware("auth:admin")->group(function() {
    Route::prefix("/admin/shop-setting/mid-level-category")->name("admin.shopSetting.midLevelCategory.")->group(function() {
        Route::get("/", [MidLevelCategoryController::class, "index"])->name("index");
        Route::get("/create", [MidLevelCategoryController::class, "create"])->name("create");
        Route::post("/", [MidLevelCategoryController::class, "store"])->name("store");
        Route::delete("/{midLevelCategory}", [MidLevelCategoryController::class, "destroy"])->name("destroy");
        Route::get("/{midLevelCategory}/edit", [MidLevelCategoryController::class, "edit"])->name("edit");
        Route::put("/{midLevelCategory}", [MidLevelCategoryController::class, "update"])->name("update");
    });
});

Route::middleware("auth:admin")->group(function() {
    Route::prefix("/admin/shop-setting/end-level-category")->name("admin.shopSetting.endLevelCategory.")->group(function() {
        Route::get("/", [EndLevelCategoryController::class, "index"])->name("index");
        Route::get("/create", [EndLevelCategoryController::class, "create"])->name("create");
        Route::delete("/{endLevelCategory}", [EndLevelCategoryController::class, "destroy"])->name("destroy");
        Route::get("/{endLevelCategory}/edit", [EndLevelCategoryController::class, "edit"])->name("edit");
    });
});

Route::middleware("auth:admin")->group(function() {
    Route::prefix("/admin/product-management")->name("admin.productManagement.")->group(function() {
        Route::get("/", [ProductManagementController::class, "index"])->name("index");
        Route::get("/create", [ProductManagementController::class, "create"])->name("create");
        Route::delete("/{product}", [ProductManagementController::class, "destroy"])->name("destroy");
        Route::get("/{product}/edit", [ProductManagementController::class, "edit"])->name("edit");
    });
});

Route::middleware("auth:admin")->group(function() {
    Route::prefix("/admin/order-management")->name("admin.orderManagement.")->group(function() {
        Route::get("/", [OrderManagementController::class, "index"])->name("index");
        Route::put("/{orderNumber}/update-payment-status", [OrderManagementController::class, "updatePaymentStatus"])->name("updatePaymentStatus");
        Route::put("/{orderNumber}/update-shipping-status", [OrderManagementController::class, "updateShippingStatus"])->name("updateShippingStatus");
        Route::delete("/{orderNumber}/delete", [OrderManagementController::class, "destroy"])->name("destroy");
    });
});


Route::middleware("auth:admin")->group(function() {
    Route::prefix("/admin/manage-sliders")->name("admin.manageSliders.")->group(function() {
        Route::get("/", [ManageSlidersController::class, "index"])->name("index");
        Route::get("/create", [ManageSlidersController::class, "create"])->name("create");
        Route::post("/", [ManageSlidersController::class, "store"])->name("store");
        Route::delete("/{slider}/delete", [ManageSlidersController::class, "destroy"])->name("destroy");
        Route::get("/{slider}/edit", [ManageSlidersController::class, "edit"])->name("edit");
        Route::put("/{slider}/update", [ManageSlidersController::class, "update"])->name("update");
    });
});

Route::middleware("auth:admin")->group(function() {
    Route::prefix("/admin/services")->name("admin.services.")->group(function() {
        Route::get("/", [ServicesManagementController::class, "index"])->name("index");
        Route::get("/create", [ServicesManagementController::class, "create"])->name("create");
        Route::post("/", [ServicesManagementController::class, "store"])->name("store");
        Route::delete("/{service}/delete", [ServicesManagementController::class, "destroy"])->name("destroy");
        Route::get("/{service}/edit", [ServicesManagementController::class, "edit"])->name("edit");
        Route::put("/{service}/update", [ServicesManagementController::class, "update"])->name("update");
    });
});

Route::middleware("auth:admin")->group(function() {
    Route::prefix("/admin/faq")->name("admin.faq.")->group(function() {
        Route::get("/", [FAQManagementController::class, "index"])->name("index");
        Route::get("/create", [FAQManagementController::class, "create"])->name("create");
        Route::post("/", [FAQManagementController::class, "store"])->name("store");
        Route::delete("/{faq}/delete", [FAQManagementController::class, "destroy"])->name("destroy");
        Route::get("/{faq}/edit", [FAQManagementController::class, "edit"])->name("edit");
        Route::put("/{faq}/update", [FAQManagementController::class, "update"])->name("update");
    });
});

Route::middleware("auth:admin")->group(function() {
    Route::prefix("/admin/registered-customers")->name("admin.registeredCustomers.")->group(function() {
        Route::get("/", [RegisteredCustomerManagementController::class, "index"])->name("index");
        Route::put("/{customer}/updateStatus", [RegisteredCustomerManagementController::class, "updateStatus"])->name("updateStatus");
        Route::delete("/{customer}/delete", [RegisteredCustomerManagementController::class, "destroy"])->name("destroy");
    });
});

Route::middleware("auth:admin")->group(function() {
    Route::prefix("/admin/social-media")->name("admin.socialMedia.")->group(function() {
        Route::get("/", [SocialMediaManagementController::class, "index"])->name("index");
        Route::put("/update", [SocialMediaManagementController::class, "update"])->name("update");
    });
});

Route::middleware("auth:admin")->group(function() {
    Route::prefix("/admin/page-setting")->name("admin.pageSettings.")->group(function() {
        Route::get("/", [PageSettingsController::class, "index"])->name("index");
        Route::put("/update-about-us", [PageSettingsController::class, "updateAboutUs"])->name("updateAboutUs");
        Route::put("/update-faq", [PageSettingsController::class, "updateFAQ"])->name("updateFAQ");
        Route::put("/update-contactus", [PageSettingsController::class, "updateContact"])->name("updateContact");
    });
});

Route::middleware("auth:admin")->group(function() {
    Route::prefix("/admin/subscribers")->name("admin.subscribers.")->group(function() {
        Route::get("/", [ManageSubscribers::class, "index"])->name("index");
        Route::delete("/{subscriber}/destroy", [ManageSubscribers::class, "destroy"])->name("destroy");
        Route::delete("/destroy-pending-subscribers", [ManageSubscribers::class, "destroyPendingSubscribers"])->name("destroyPendingSubscribers");
        Route::get("/export", [ManageSubscribers::class, "exportCsv"])->name("export");
    });
});








// Route::get("/admin/shop-setting/color", [AdminController::class, "color"])->name("admin.shopSetting.color");
// Route::get("/admin/shop-setting/country", [AdminController::class, "country"])->name("admin.shopSetting.country");
// Route::get("/admin/shop-setting/shipping-cost", [AdminController::class, "shippingCost"])->name("admin.shopSetting.shippingCost");
// Route::get("/admin/shop-setting/top-level-category", [AdminController::class, "topLevelCategory"])->name("admin.shopSetting.topLevelCategory");
// Route::get("/admin/shop-setting/mid-level-category", [AdminController::class, "midLevelCategory"])->name("admin.shopSetting.midLevelCategory");
// Route::get("/admin/shop-setting/end-level-category", [AdminController::class, "endLevelCategory"])->name("admin.shopSetting.endLevelCategory");

// Route::get("/admin/product-management", [AdminController::class, "productManagement"])->name("admin.productManagement");
// Route::get("/admin/order-management", [AdminController::class, "orderManagement"])->name("admin.orderManagement");
// Route::get("/admin/manage-sliders", [AdminController::class, "manageSliders"])->name("admin.manageSliders");
// Route::get("/admin/services", [AdminController::class, "services"])->name("admin.services");
// Route::get("/admin/faq", [AdminController::class, "faq"])->name("admin.faq");
// Route::get("/admin/registered-customers", [AdminController::class, "registeredCustomers"])->name("admin.registeredCustomers");
// Route::get("/admin/page-settings", [AdminController::class, "pageSettings"])->name("admin.pageSettings");
// Route::get("/admin/social-media", [AdminController::class, "socialMedia"])->name("admin.socialMedia");
// Route::get("/admin/subscriber", [AdminController::class, "subscriber"])->name("admin.subscriber");


