<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ShippingCost;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function destroy($id) {
        $cart = json_decode(request()->cookie("cart", "[]"), true);
        $updated_cart = collect($cart)->filter(fn($item) => $item["cart_item_id"] != $id)->all();
     
        return back()
                ->with("success", "Cart item deleted successfully")
                ->cookie("cart", json_encode($updated_cart), 60 * 24 * 30);
    }


    public function checkout() {
        $user = auth()->user();
        $shipping_cost = ShippingCost::where("country_id", $user->country)->value("amount");
        
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
            "user" => $user
        ]);
    }
}
