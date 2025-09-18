<?php

namespace App\Http\Controllers\Admin\ShopSettings;
use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function size() {
        $sizes = Size::all();

        return view("admin.panels.shop-settings.size", compact("sizes"));
    }

    public function updateSizeForm(Size $size) {
        return view("admin.panels.shop-settings.update-forms.updateSizeForm", compact("size"));
    }

    public function updateSize(Size $size, Request $request) {
        $validatedData = $request->validate([
            "size_name" => "required|string|max:255|unique:sizes,name," . $size->id
        ],[
            "size_name.unique" => "This size name already exists.",
        ]);

        $fieldsToUpdate = [
            "name" => $validatedData["size_name"]
        ];

        $size->update($fieldsToUpdate);

        return back()->with("success", "Size updated successfully");
    }


  
}
