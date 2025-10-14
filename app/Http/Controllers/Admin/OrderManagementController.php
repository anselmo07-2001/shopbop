<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Mail\AdminSendOrderMessage;
use App\Models\Order;
use App\Models\PageSetting;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderManagementController extends Controller
{
    public function index() {
        return view("admin.panels.order-management.index");
    }

    public function updatePaymentStatus($orderNumber) {   
        DB::transaction(function() use($orderNumber) {
            Payment::where("order_number", $orderNumber)->update([
                "payment_status" => "paid"
            ]);
               
            $orders = Order::with("product")->where("order_number", $orderNumber)->get();
    
            foreach ($orders as $order) {
                if ($order->product->quantity >= $order->quantity) {
                    $order->product()->lockForUpdate()->decrement('quantity', $order->quantity);
                } else {
                    throw new \Exception("Insufficient stock for {$order->product->name}");
                }
            }
        });

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

    public function sendMessage(Request $request) {
        $contact_email = PageSetting::firstOrFail()->contact_email;

        $validated_data = $request->validate([
            "email" => "required|email",
            "subject" => "required|string|max:255",
            "message" => "required|string"
        ]);

        Mail::to($validated_data["email"])->send(new AdminSendOrderMessage($validated_data, $contact_email));

        return back()->with("success", "Message sent successfully");
    }


    //  $contact_email = PageSetting::firstOrFail()->contact_email;
    
    //     $request->validate([
    //         "full_name" => "required|string|max:255",
    //         "email" => "required|email",
    //         "phone_number" => "required|regex:/^\+?[0-9\s\-\(\)]{10,20}$/",
    //         "message" => "required|string",
    //         'g-recaptcha-response' => 'required|captcha',
    //     ]);

    //     $data = $request->only("full_name", "email", "phone_number", "message");

    //     Mail::to($contact_email)->send(new ContactMail($data));

    //     return back()->with("success", "Message sent successfully");
}
