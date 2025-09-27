<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductManagementController extends Controller
{
    public function index() {
        return view("admin.panels.product-management.index");
    }

    public function create() {
        $sizes = Size::all();
        $colors = Color::all();

        return view("admin.panels.product-management.create", [
            "sizes" => $sizes,
            "colors" => $colors
        ]);
    }
}
