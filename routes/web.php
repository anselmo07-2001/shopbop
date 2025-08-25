<?php

use App\Http\Controllers\PageController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;


Route::get("/", [PageController::class, "index"])->name("home");