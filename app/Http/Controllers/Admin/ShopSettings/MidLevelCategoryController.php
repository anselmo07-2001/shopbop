<?php

namespace App\Http\Controllers\Admin\ShopSettings;
use App\Http\Controllers\Controller;
use App\Models\MidCategory;
use App\Models\TopCategory;
use Illuminate\Http\Request;

class MidLevelCategoryController extends Controller
{
    public function index() {
       return view("admin.panels.shop-settings.mid-level-category");
    }

    public function create() {
        $top_level_categories = TopCategory::all();
        return view("admin.panels.shop-settings.update-forms.midLevelCategory.addMidLevelCategory", compact("top_level_categories"));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            "top_level_category_name" => "required|exists:top_categories,id",
            "mid_level_category_name" => "required|string|max:255"
        ]);

        MidCategory::create([
            "name" => $validatedData["mid_level_category_name"],
            "top_category_id" => $validatedData["top_level_category_name"],
        ]);

        return redirect()->route("admin.shopSetting.midLevelCategory.index")
                    ->with("success", "Created Mid Level Category successfully");
    }

    public function destroy(MidCategory $midLevelCategory) {
        $midLevelCategory->delete();
        return back()->with("success", "Mid Level Category deleted succesfully");
    }
}
