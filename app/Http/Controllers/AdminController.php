<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        return view("admin.panels.dashboard");
    }

    public function websiteSetting() {
        return view("admin.panels.website-setting");
    }

    public function productManagement() {
        return view("admin.panels.product-management");
    }

    public function orderManagement() {
        return view("admin.panels.order-management");
    }

    public function manageSliders() {
        return view("admin.panels.manage-sliders");
    }
}
