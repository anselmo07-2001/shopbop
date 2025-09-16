<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\EndCategory;
use App\Models\MidCategory;
use App\Models\Payment;
use App\Models\Product;
use App\Models\TopCategory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        $total_products = Product::all()->count();
        $total_pending_orders = Payment::where("payment_status", "pending")->count();
        $total_completed_orders = Payment::where("payment_status", "completed")->count();
        $total_completed_shipping = Payment::where("shipping_status", "completed")->count();
        $total_pending_shipping = Payment::where("shipping_status", "pending")->count();
        $total_active_customers = Customer::where("status", "active")->count();
        $total_available_shippings = Payment::where("payment_status", "completed")
                                    ->where("shipping_status", "pending")->count();
        $total_top_categories = TopCategory::count();
        $total_mid_categories = MidCategory::count();
        $total_end_categories = EndCategory::count();

        return view("admin.panels.dashboard", [
            "total_products" => $total_products,
            "total_pending_orders" => $total_pending_orders,
            "total_completed_orders" => $total_completed_orders,
            "total_completed_shipping" => $total_completed_shipping,
            "total_pending_shipping" => $total_pending_shipping,
            "total_active_customers" => $total_active_customers,
            "total_available_shippings" => $total_available_shippings,
            "total_top_categories" => $total_top_categories,
            "total_mid_categories" => $total_mid_categories,
            "total_end_categories" => $total_end_categories
        ]);
    }

    public function editProfile() {
        return view("admin.panels.edit-profile");
    }

    public function websiteSetting() {
        return view("admin.panels.website-setting");
    }

    public function updateBranding(Request $request) {
        $validatedData = $request->validate([
            "logo" => "nullable|image|mimes:png,jpg,jpeg,svg|max:2048",
            'favicon' => 'nullable|image|mimes:png,ico|max:1024', 
        ]);

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
