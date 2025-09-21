<?php

namespace App\Http\Controllers\Admin\ShopSettings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    public function index() {
        return view("admin.panels.shop-settings.color");
    }

    public function create() {
        
    }
}
