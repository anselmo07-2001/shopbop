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

    public function size() {
        return view("admin.panels.shop-settings.size");
    }

    public function color() {
        return view("admin.panels.shop-settings.color");
    }

    public function country() {
         return view("admin.panels.shop-settings.country");
    }

    public function shippingCost() {
         return view("admin.panels.shop-settings.shipping-cost");
    }

    public function topLevelCategory() {
        return view("admin.panels.shop-settings.top-level-category");
    }

    public function midLevelCategory() {
        return view("admin.panels.shop-settings.mid-level-category");
    }

    public function endLevelCategory() {
        return view("admin.panels.shop-settings.end-level-category");
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

    public function services() {
        return view("admin.panels.services");
    }

    public function faq() {
        return view("admin.panels.faq");
    }

    public function registeredCustomers() {
        return view("admin.panels.registered-customers");
    }

    public function pageSettings() {
         return view("admin.panels.page-settings");
    }

    public function socialMedia() {
         return view("admin.panels.social-media");
    }

    public function subscriber() {
         return view("admin.panels.subscriber");
    }
}
