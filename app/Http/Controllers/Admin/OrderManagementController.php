<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function destroy($orderNumber) {
        $order = Order::where('order_number', $orderNumber)->first();

        if (!$order) {
            return back()->with('error', 'Order not found.');
        }

        DB::transaction(function () use($orderNumber) {
            Order::where("order_number", $orderNumber)->delete();
            Payment::where("order_number", $orderNumber)->delete();     
        });

        return back()->with("success", "Updated payment status successfully.");
    }
}
