<?php

namespace App\Http\Controllers\Admin\ShopSettings;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MidLevelCategoryController extends Controller
{
    public function index() {
       return view("admin.panels.shop-settings.mid-level-category");
    }
}
