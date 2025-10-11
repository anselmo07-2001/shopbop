<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Support\Str;

use function PHPUnit\Framework\isEmpty;

class CartController extends Controller
{
    public function update(Request $request, $id) {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = json_decode(request()->cookie('cart', '[]'), true);

        $updated_cart = collect($cart)->map(function($item) use($id, $validated) {
            if ($item['cart_item_id'] == $id) {
                $item["quantity"] = $validated["quantity"];
            }

            return $item;
        })->values()->all();

        return back()
                ->with("success", "Cart updated successfully")
                ->cookie("cart", json_encode($updated_cart), 60 * 24 * 30);
    }


    public function destroy($id) {
        $cart = json_decode(request()->cookie('cart', '[]'), true);

        $updated_cart = collect($cart)
                    ->filter(fn($item) => $item["cart_item_id"] != $id)
                    ->values()
                    ->all();

        return back()
                ->with("success", "Cart item deleted successfully")
                ->cookie("cart", json_encode($updated_cart), 60 * 24 * 30);
    }


    public function index(): View {
        $cart = json_decode(request()->cookie('cart', '[]'), true);

        $ids = collect($cart)->pluck("id")->all();

        $products = Product::whereIn("id", $ids)->get()->keyBy("id");

        $items = collect($cart)->map(function($item) use ($products) {
            $product = $products[$item['id']] ?? null;
            $price = $product?->current_price ?? 0;

            return [
                'product' => $products[$item['id']] ?? null,
                "cart_item_id" => $item["cart_item_id"],
                'size' => $item['size'],
                'color' => $item['color'],
                'quantity'=> $item['quantity'],
                "sub_total" => $price * $item["quantity"],
            ];
        });

        $total = $items->sum("sub_total");

        return view("pages.cart", compact("items", "total"));
    }


    public function add(Request $request) {
        $product = Product::findOrFail($request->id);

        if ($product->quantity <= 0) {
            return redirect()->back()->with("failed", "No available stock for this product");
        }

        $validator = Validator::make($request->all(), [
            "size" => "required",
            "color" => "required",
            "quantity" => [
                "required",
                "integer",
                "min:1",
                function ($attribute, $value, $fail) use ($product) {
                    if ($value > $product->quantity) {
                       $fail("The quantity cannot exceed available stock ({$product->quantity}).");
                    }
                }
            ]
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validate();
    
        $cart = json_decode(request()->cookie("cart", "[]"), true);

        //Check if the item is already exist in the cart
        // cart_items hold only 1 product but has different size and product
        $cart_items = collect($cart)->filter(fn($item) => $item["id"] == $product->id)->all();

        if (!empty($cart_items)) {
            
            $exists = collect($cart_items)
                ->contains(fn($item) => $item["size"] == $validated["size"] && $item["color"] == $validated["color"]);

            if ($exists) {
                return back()->with("failed", "You’ve already added this item to the cart.");
            }

        }

         $cart[] = [
                "id" => $product->id,
                "price" => $product->current_price,

                "cart_item_id" => (string) Str::uuid(),
                "size" => $validated["size"],
                "color" => $validated["color"],
                "quantity" => $validated["quantity"],
            ];

        return back()
                ->with("success", "Item added successfully.")
                ->cookie("cart", json_encode($cart), 60 * 24 * 30);

    }
}
