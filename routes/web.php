<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;


Route::get("/", [PageController::class, "index"])->name("home");
Route::get("/faq", [FaqController::class, "faq"])->name("faq");
Route::get("/contactUs", [ContactUsController::class, "contactUs"])->name("contactUs");
Route::get("/aboutUs", [AboutUsController::class, "aboutUs"])->name("aboutUs");
Route::get("/cart", [CartController::class, "cart"])->name("cart");


Route::get("/login", [LoginController::class, "login"])->name("login");
Route::post("/login", [LoginController::class, "loginCustomer"])->name("login.customer");

Route::post("/logout", [LoginController::class, "logoutCustomer"])->name("logout.customer");


Route::get("/register", [RegisterController::class, "register"])->name("register");
Route::post("/store", [RegisterController::class, "store"])->name("register.store");


Route::get("/level/{level}/category/{id}/value/{value}", [CategoryController::class, "index"])->name("category.index");

Route::get("/products/{id}", [ProductController::class, "show"])->name("product.show");
Route::get("/search", [ProductController::class, "search"])->name("product.search");