<?php

namespace App\Http\Controllers\Admin\ShopSettings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Color;

class ColorController extends Controller
{
    public function index() {
        return view("admin.panels.shop-settings.color");
    }

    public function create() {
        return view("admin.panels.shop-settings.update-forms.color.addColor");
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            "color_name" => "required|string|max:255|unique:colors,name" 
        ], [
            "color_name.unique" => "This size name already exists.",
        ]);

        Color::create([
            "name" => $validatedData["color_name"]
        ]);

        return redirect()->route("admin.shopSetting.color.index")
                 ->with("success", "New color created successfully");
    }
}
