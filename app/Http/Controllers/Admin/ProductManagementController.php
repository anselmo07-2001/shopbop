<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Size;
use App\Models\TopCategory;
use Illuminate\Http\Request;

class ProductManagementController extends Controller
{
    public function index() {
        return view("admin.panels.product-management.index");
    }

    public function create() {
        $top_categories = TopCategory::all();
        $sizes = Size::all();
        $colors = Color::all();

        return view("admin.panels.product-management.create", [
            "top_categories" => $top_categories,
            "sizes" => $sizes,
            "colors" => $colors
        ]);
    }
}
