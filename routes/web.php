<?php

use App\Http\Controllers\FaqController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;


Route::get("/", [PageController::class, "index"])->name("home");
Route::get("/faq", [FaqController::class, "faq"])->name("faq");


Route::get("/login", [LoginController::class, "login"])->name("login");
Route::get("/register", [RegisterController::class, "register"])->name("register");