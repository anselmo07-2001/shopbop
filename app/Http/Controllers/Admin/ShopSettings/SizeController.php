<?php

namespace App\Http\Controllers\Admin\ShopSettings;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SizeController extends Controller
{
     public function size() {
        return view("admin.panels.shop-settings.size");
    }
  
}
