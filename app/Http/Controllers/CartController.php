<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

use function PHPUnit\Framework\isEmpty;

class CartController extends Controller
{
    public function cart(): View {
        return view("pages.cart");
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
            "name" => $product->name,
            "price" => $product->current_price,

            "size" => $validated["size"],
            "color" => $validated["color"],
            "quantity" => $validated["quantity"],
        ];

        return back()->cookie("cart", json_encode($cart), 60 * 24 * 30);
    }
}
