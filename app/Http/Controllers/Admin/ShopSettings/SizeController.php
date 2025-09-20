<?php

namespace App\Http\Controllers\Admin\ShopSettings;
use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index(Request $request) {
        return view("admin.panels.shop-settings.size");
    }

    public function edit(Size $size) {
        return view("admin.panels.shop-settings.update-forms.updateSizeForm", compact("size"));
    }

    public function create() {
        return view("admin.panels.shop-settings.update-forms.addItemForm");
    }

    public function update(Size $size, Request $request) {
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

    public function destroy(Size $size) {   
        $size->delete();
        return back()->with("success", "Size deleted succesfully");
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            "size_name" => "required|string|max:255|unique:sizes,name" 
        ],[
            "size_name.unique" => "This size name already exists.",
        ]);

        Size::create([
            "name" => $validatedData["size_name"]
        ]);

        return redirect()->route('admin.shopSetting.size.index')
            ->with("success", "New size created successfully");
    }

}
