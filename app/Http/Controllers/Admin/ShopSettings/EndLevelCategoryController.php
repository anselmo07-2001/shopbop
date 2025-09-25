<?php

namespace App\Http\Controllers\Admin\ShopSettings;
use App\Http\Controllers\Controller;
use App\Models\EndCategory;
use App\Models\MidCategory;
use App\Models\TopCategory;
use Illuminate\Http\Request;

class EndLevelCategoryController extends Controller
{
    public function index() {
        return view("admin.panels.shop-settings.end-level-category");
    }

    public function create() {
        $top_level_categories = TopCategory::all();
        $mid_level_categories = MidCategory::all();

        return view("admin.panels.shop-settings.update-forms.endLevelCategory.addEndLevelCategory", [
            "top_level_categories" => $top_level_categories,
            "mid_level_categories" => $mid_level_categories
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            "top_level_category_name" => "required|exists:top_categories,id",
            "mid_level_category_name" => "required|exists:mid_categories,id",
            "end_level_category_name" => "required|string|max:255|unique:end_categories,name"
        ]);

        EndCategory::create([
            "name" => $validatedData["end_level_category_name"],
            "mid_category_id" => $validatedData["mid_level_category_name"],
        ]);

        return redirect()
                ->route("admin.shopSetting.endLevelCategory.index")
                ->with("success", "Created End Level Category Successfully.");
    }

    public function destroy() {

    }

    public function edit() {

    }

    public function update() {

    }
}

