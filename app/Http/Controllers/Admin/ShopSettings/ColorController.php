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

    public function edit(Color $color) {
        return view("admin.panels.shop-settings.update-forms.color.updateColor", compact("color"));
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

    public function destroy(Color $color) {
        $color->delete();
        return back()->with("success", "Color deleted successfully");
    }

    public function update(Color $color, Request $request) {
        $validatedData = $request->validate([
            "color_name" => "required|string|max:255|unique:sizes,name," . $color->id
        ],[
            "color_name.unique" => "This size name already exists.",
        ]);

        $fieldsToUpdate = [
            "name" => $validatedData["color_name"]
        ];

        $color->update($fieldsToUpdate);

        return back()->with("success", "Size updated successfully");
    }

}
