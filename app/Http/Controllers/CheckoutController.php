<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PageSetting;
use App\Models\Payment;
use App\Models\Product;
use App\Models\ShippingCost;
use App\Models\ShippingCostAll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function placeOrder(Request $request) {
        $user = auth()->user();
        
        $shipping_cost = ShippingCost::where("country_id", $user->country_id)->value("amount") ?? ShippingCostAll::firstOrFail()->amount;

        $payment_method = $request->input("payment_method");
        $transaction_info = $request->input("transactionInfo");
        $order_number = (string) Str::uuid();

        $cart = json_decode(request()->cookie("cart", "[]"), true);
        
        $cart_items_id = collect($cart)->pluck("id")->all();

        $productsInfo = Product::whereIn("id", $cart_items_id)->get()->keyBy("id");
        
        $order_items = collect($cart)->map(function($item) use($productsInfo, $order_number) {
            $productInfo = $productsInfo[$item["id"]] ?? null;
            if (!$productInfo) return null;

            return [    
                "unit_price" => $productInfo->current_price, 
                "size" => $item["size"],
                "color" => $item["color"],
                "quantity" => $item["quantity"],
                "order_number" => $order_number,
                "product_id" => $productInfo->id,
                "customer_id" => auth()->id(),
                "created_at" => now(),
                "updated_at" => now(),
            ];
        })->filter()->toArray();

        $payment_detail = [];
        $total_amount = collect($order_items)->sum(fn($item) => $item["unit_price"] * $item["quantity"]) + $shipping_cost;

        if ($payment_method == "bank_deposit") {
            $payment_detail = [
                "payment_date" => now(),
                "txn_id" => null,  // no auto txn_id for bank deposit
                "card_brand" => null,  // not applicable
                "card_number_last_4" => null,  // not applicable
                "paid_amount" => $total_amount,
                "bank_transaction_info" => $transaction_info,
                "payment_method" => "bank_deposit",
                "payment_status" => "pending",
                "shipping_status" => "pending",
                "order_number" => $order_number,
                "customer_id" => auth()->id()
            ];
        }
        elseif ($payment_method === "stripe") {
            Stripe::setApiKey(config('services.stripe.secret'));
             // Get payment method ID from form
            $paymentMethodId = $request->input('stripe_payment_method');

            if (!$paymentMethodId) {
                return back()->with('error', 'Stripe payment failed: missing payment method ID.');
            }

            try {
                $paymentIntent = PaymentIntent::create([
                    'amount' => intval(($total_amount + $shipping_cost) * 100), // Stripe uses cents
                    'currency' => 'usd',
                    'payment_method' => $paymentMethodId,
                    'confirm' => true,
                    'automatic_payment_methods' => [
                        'enabled' => true,
                        'allow_redirects' => 'never',
                    ],
                ]);

                $charges = $paymentIntent->charges->data[0] ?? null;
                $card = $charges?->payment_method_details?->card;

                $payment_detail = [
                    "payment_date" => now(),
                    "txn_id" => $charges?->id,
                    "card_brand" => $card?->brand,
                    "card_number_last_4" => $card?->last4,
                    "paid_amount" => $total_amount,
                    "bank_transaction_info" => null,
                    "payment_method" => "stripe",
                    "payment_status" => "paid",
                    "shipping_status" => "pending",
                    "order_number" => $order_number,
                    "customer_id" => auth()->id()
                ];
            } catch (\Exception $e) {
                return back()->with('error', 'Stripe payment failed: ' . $e->getMessage());
            }
        }

        
        DB::transaction(function () use($order_items, $payment_detail, $payment_method) {
            Order::insert($order_items);

            // Reduce stock for Stripe payments
            if ($payment_method === "stripe") {
                foreach($order_items as $order_item) {
                    $product = Product::where('id', $order_item['product_id'])
                                ->lockForUpdate()
                                ->first();

                    if ($product && $product->quantity >= $order_item['quantity']) {
                        $product->decrement('quantity', $order_item['quantity']);
                    } else {
                        throw new \Exception("Not enough stock for product ID: ".$order_item['product_id']);
                    }
                }
            }

            Payment::create($payment_detail);
        });

        return redirect()
                ->route("home")
                ->with("success", "Thank you! Your order was placed successfully.")
                ->cookie("cart", json_encode([]));
    }




    public function destroy($id) {
        $cart = json_decode(request()->cookie("cart", "[]"), true);
        $updated_cart = collect($cart)->filter(fn($item) => $item["cart_item_id"] != $id)->all();
     
        return back()
                ->with("success", "Cart item deleted successfully")
                ->cookie("cart", json_encode($updated_cart), 60 * 24 * 30);
    }

    public function checkout() {
        $user = auth()->user();
        $shipping_cost = ShippingCost::where("country_id", $user->country_id)->value("amount") ?? ShippingCostAll::firstOrFail()->amount;

        $bank_detail = PageSetting::where('id', 1)->value('bank_detail');
              
        $cart = json_decode(request()->cookie("cart", "[]"), true);
        
        $ids = collect($cart)->pluck("id")->all();

        $products = Product::whereIn("id", $ids)->get()->keyBy("id");

        $checkout_items = collect($cart)->map(function($item) use($products) {
            $product = $products[$item["id"]] ?? null;
            $price = $product?->current_price;
        
            return [
                "product" => $products[$item["id"]],
                "cart_item_id" => $item["cart_item_id"],
                "size" => $item["size"],
                "color" => $item["color"],
                "quantity" => $item["quantity"],
                "sub_total" => $price * $item["quantity"],
            ];
        });
   
        return view("pages.checkout", [
            "checkout_items" => $checkout_items,
            "shipping_cost" => $shipping_cost,
            "user" => $user,
            "bank_detail" => $bank_detail
        ]);
    }
}
