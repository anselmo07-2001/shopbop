<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\PageSetting;
use Illuminate\Http\Request;

class PageSettingsController extends Controller
{
    /**
     * Trim all string values and convert empty strings to null.
     *
     * @param  array  $items
     * @return array
     */
    private function nullify($items) {
        return array_map(function($value) {
            $value = is_string($value) ? trim($value) : $value;
            return $value === "" ? null : $value;
        }, $items);
    }

    public function index(Request $request) {
        $tab = request("tab", "about_us");
        $page_settings = PageSetting::first();

        return view("admin.panels.page-settings.index", [
            "tab" => $tab,
            "page_settings" => $page_settings
        ]);
    }

    public function updateAboutUs(Request $request) {
        $validated_data = $request->validate([
            "about_us_title" => "required|string|max:255",
            "about_us_content" => "required|string",
            "about_us_meta_title" => "nullable|string|max:255",
            "about_us_meta_keywords" => "nullable|string",
            "about_us_meta_description" => "nullable|string"
        ]);

        $validated_data = $this->nullify($validated_data);

        $page_settings = PageSetting::firstOrFail();

        $page_settings->update($validated_data);

        return back()->with("success", "Successfully updated the about us page.");
    }

    public function updateFAQ(Request $request){
        $validated_data = $request->validate([
            "faq_title" => "required|string|max:255",
            "faq_subtitle" => "required|string|max:255",
            "faq_meta_title" => "nullable|string|max:255",
            "faq_meta_keywords" => "nullable|string",
            "faq_meta_description" => "nullable|string",
        ]);

        $validated_data = $this->nullify($validated_data);

        $page_settings = PageSetting::firstOrFail();

        $page_settings->update($validated_data);

        return back()->with("success", "Successfully updated the FAQ page.");
    }
}
