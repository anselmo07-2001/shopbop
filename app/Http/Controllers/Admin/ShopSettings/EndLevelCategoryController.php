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
        return view("admin.panels.shop-settings.update-forms.endLevelCategory.addEndLevelCategory");
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            "top_level_category_name" => "required|exists:top_categories,id",
            "mid_level_category_name" => [
                "required",
                "exists:mid_categories,id",
                function ($attribute, $value, $fail) use ($request) {
                    $mid = MidCategory::find($value);
                    if ($mid && $mid->top_category_id != $request->top_level_category_name) {
                        $fail("The selected mid-level category does not belong to the chosen top-level category.");
                    }
                }
            ],
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

    public function destroy(EndCategory $endLevelCategory) {
        $endLevelCategory->delete();
        return back()->with("success", "End Level Category deleted succesfully");
    }

    public function edit(EndCategory $endLevelCategory) {
        // $top_level_categories = TopCategory::all();
        // $mid_level_categories = MidCategory::all();

        // return view("admin.panels.shop-settings.update-forms.endLevelCategory.updateEndLevelCategory", [
        //     "top_level_categories" => $top_level_categories,
        //     "mid_level_categories" => $mid_level_categories,
        //     "end_level_category" => $endLevelCategory
        // ]);
    }

    // public function update(Request $request, EndCategory $endLevelCategory) {
    //     $validatedData = $request->validate([
    //         "top_level_category_name" => "required|exists:top_categories,id",
    //         "mid_level_category_name" => "required|exists:mid_categories,id",
    //         "end_level_category_name" => "required|string|max:255|unique:end_categories,name," . $endLevelCategory->id
    //     ]);

        
    // }
}

