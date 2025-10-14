<?php

namespace App\Http\Controllers\Admin\ShopSettings;
use App\Http\Controllers\Controller;
use App\Models\EndCategory;
use App\Models\MidCategory;
use App\Models\TopCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class EndLevelCategoryController extends Controller
{
    private function clearCache() {
        Cache::forget('subMenu');
        Cache::forget('sideMenu');
    }

    public function index() {
        return view("admin.panels.shop-settings.end-level-category");
    }

    public function create() {
        return view("admin.panels.shop-settings.update-forms.endLevelCategory.addEndLevelCategory");
    }

    public function destroy(EndCategory $endLevelCategory) {
        $endLevelCategory->delete();
        $this->clearCache();
        return back()->with("success", "End Level Category deleted succesfully");
    }

    public function edit(EndCategory $endLevelCategory) {
        return view("admin.panels.shop-settings.update-forms.endLevelCategory.updateEndLevelCategory", 
                    compact("endLevelCategory"));
    }
}
        
     