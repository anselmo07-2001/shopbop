<?php

namespace App\Http\Controllers;

use App\Models\EndCategory;
use App\Models\MidCategory;
use App\Models\Product;
use App\Models\TopCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{

    public function index($level, $id, $value) {
        $sideMenu = Cache::remember("sideMenu", 3600, function() { 
                       return TopCategory::with("midCategories.endCategories.products")->where("show_on_menu", 1)->get();
                    });

        $category_products = [];

        if ($level === "top_category") {
            $topCategory = TopCategory::with("midCategories.endCategories.products")->findOrFail($id);
            $productIds = $topCategory->midCategories->flatMap
                                    ->endCategories->flatMap
                                    ->products->pluck("id");

            $category_products = Product::whereIn('id', $productIds)->paginate(6);
        }

        if ($level === "mid_category") {
            $category_products = MidCategory::with("endCategories.products")->findOrFail($id);
            $productIds = $category_products->endCategories->flatMap
                                ->products->pluck("id");

            $category_products = Product::whereIn('id', $productIds)->paginate(6);
        }

        if ($level === "end_category") {
            $category_products = EndCategory::with("products")->findOrFail($id); 
            $productIds = $category_products->products->pluck("id");

            $category_products = Product::whereIn('id', $productIds)->paginate(6);
        }


        return view("pages.category", [
            "category_products" => $category_products,
            "value" => $value,
            "sideMenu" => $sideMenu
        ]);
    }
}
