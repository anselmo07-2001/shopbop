<?php

namespace App\Http\Controllers\Admin\ShopSettings;
use App\Http\Controllers\Controller;
use App\Models\TopCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TopLevelCategoryController extends Controller
{
    public function index() {
        return view("admin.panels.shop-settings.top-level-category");
    }

    public function create() {
        return view("admin.panels.shop-settings.update-forms.topLevelCategory.addTopLevelCategory");
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            "name" => "required|string|max:255|unique:top_categories,name",
            "show_on_menu" => "required|boolean",
        ]);

        TopCategory::create($validatedData);

        return redirect()->route('admin.shopSetting.topLevelCategory.index')
            ->with("success", "New Top Level Category created successfully");
    }

    public function destroy(TopCategory $topLevelCategory) {
        $topLevelCategory->delete();
        return back()->with("success", "Top level category deleted succesfully");
    }

    public function edit(TopCategory $topLevelCategory) {
        return view("admin.panels.shop-settings.update-forms.topLevelCategory.updateTopLevelCategory", compact("topLevelCategory"));
    }

    public function update(Request $request, TopCategory $topLevelCategory) {
        $validatedData = $request->validate([
            "name" => "required|string|max:255|unique:top_categories,name," . $topLevelCategory->id,
            "show_on_menu" => "required|boolean",
        ]);

        $topLevelCategory->update($validatedData);
        Cache::forget('subMenu');
        Cache::forget('sideMenu');

        return back()->with("success", "Top level category updated succesfully");
    }
}
