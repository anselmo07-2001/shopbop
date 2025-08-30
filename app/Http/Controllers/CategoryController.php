<?php

namespace App\Http\Controllers;

use App\Models\EndCategory;
use App\Models\MidCategory;
use App\Models\TopCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($level, $id, $value) {

        $category_products = [];

        if ($level === "top_category") {
            $category_products = TopCategory::with("midCategories.endCategories.products")->findOrFail($id);
            $category_products = $category_products->midCategories->flatMap->endCategories->flatMap->products;
        }

        if ($level === "mid_category") {
            $category_products = MidCategory::with("endCategories.products")->findOrFail($id);
            $category_products = $category_products->endCategories->flatMap->products;
        }

        if ($level === "end_category") {
            $category_products = EndCategory::with("products")->findOrFail($id);
            $category_products = $category_products->products;
        }


        return view("pages.category", [
            "category_products" => $category_products,
            "value" => $value
        ]);
    }
}
