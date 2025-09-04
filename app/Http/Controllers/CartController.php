<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

use function PHPUnit\Framework\isEmpty;

class CartController extends Controller
{
    public function destroy($id) {
        $cart = json_decode(request()->cookie('cart', '[]'), true);

        $updated_cart = collect($cart)
                    ->filter(fn($item) => $item["id"] != $id)
                    ->values()
                    ->all();

        return back()->cookie("cart", json_encode($updated_cart), 60 * 24 * 30);
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

        $validator = Validator::make($request->all(), [
            "size" => "required",
            "color" => "required",
            "quantity" => "required"
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validate();
    
        $cart = json_decode(request()->cookie("cart", "[]"), true);

        $cart[] = [
            "id" => $product->id,
            "price" => $product->current_price,

            "size" => $validated["size"],
            "color" => $validated["color"],
            "quantity" => $validated["quantity"],
        ];

        return back()->cookie("cart", json_encode($cart), 60 * 24 * 30);
    }
}
