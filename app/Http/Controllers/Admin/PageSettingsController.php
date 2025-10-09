<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\PageSetting;
use Illuminate\Http\Request;

class PageSettingsController extends Controller
{
    public function index(Request $request) {
        $tab = request("tab", "about_us");
        $page_settings = PageSetting::first();

        return view("admin.panels.page-settings.index", [
            "tab" => $tab,
            "page_settings" => $page_settings
        ]);
    }

    public function updateAboutUs(Request $request) {
        $validatedData = $request->validate([
            "about_us_title" => "required|string|max:255",
            "about_us_content" => "required|string",
            "about_us_meta_title" => "required|string|max:255",
            "about_us_meta_keywords" => "required|string",
            "about_us_meta_description" => "required|string"
        ]);

        $validatedData = array_map('trim', $validatedData);

        $page = PageSetting::firstOrFail();

        $page->update($validatedData);

        return back()->with("success", "Successfully updated the about us page.");
    }
}
