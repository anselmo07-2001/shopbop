<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use App\Models\ProductColor;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function search(Request $request) {
        $term = $request->input("search_text");
        $products = Product::search($term)->paginate(9);
        return view("pages.search", [
             "products" => $products,
             "term" => $term
        ]); 
    }


    public function show($id): View {
        $product = Product::findorFail($id);
        $product_galleries = ProductGallery::where("product_id", $product->id)->get();

        $ratings = $product->ratings()->get();
  
        //Get the sizes of this specific product
        $product_sizes = ProductSize::with("size")->where("product_id", $product->id)->get();
        $product_sizes = $product_sizes->map(fn($p_sizes) => $p_sizes);

        //Get the sizes of this specific product
        $product_colors = ProductColor::with("color")->where("product_id", $product->id)->get();
        $product_colors = $product_colors->map(fn($p_colors) => $p_colors);

        //Build the breadcrumbs
        $breadcrumbs = Product::with("endCategory.midCategory.topCategory")->find($product->id);

        //Related Products
        $relatedProducts = Product::where("end_category_id", $product->end_category_id)
                            ->where("id", "!=" ,$product->id) ->get();

        // Comment Section
        $has_purchased = Order::where("customer_id", auth("customer")->id())
                            ->where("product_id", $product->id)
                            ->whereHas("payments", function($query) {
                                $query->where("shipping_status", "shipped"); 
                            })
                            ->exists();

        // $has_reviewed = Rating::where("customer_id", auth("customer")->id())
        //                     ->where("product_id", $product->id)
        //                     ->exists();

        $reviewed = Rating::where("customer_id", auth("customer")->id())
                        ->where("product_id", $product->id)->first();

        

        return view("pages.product", [
            "product" => $product,
            "product_galleries" => $product_galleries,
            "product_sizes" => $product_sizes,
            "product_colors" => $product_colors,
            "breadcrumbs" => $breadcrumbs,
            "relatedProducts" => $relatedProducts,
            "ratings" => $ratings,
            "has_purchased" => $has_purchased,
            "reviewed" => $reviewed
        ]);
    }
}
