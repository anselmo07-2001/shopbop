<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class OrderManagementController extends Controller
{
    public function index() {
        return view("admin.panels.order-management.index");
    }

    public function updatePaymentStatus($orderNumber) {
        Payment::where("order_number", $orderNumber)->update([
            "payment_status" => "paid"
        ]);

        return back()->with("success", "Updated payment status successfully.");
    }

    public function updateShippingStatus($orderNumber) {
        Payment::where("order_number", $orderNumber)->update([
            "shipping_status" => "shipped"
        ]);

        return back()->with("success", "Updated payment status successfully.");
    }
}
