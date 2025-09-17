<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Customer;
use App\Models\EndCategory;
use App\Models\MidCategory;
use App\Models\Payment;
use App\Models\Product;
use App\Models\TopCategory;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
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
}
