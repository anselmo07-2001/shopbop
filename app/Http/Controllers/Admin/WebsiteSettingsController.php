<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSetting;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebsiteSettingsController extends Controller
{
    public function websiteSetting(Request $request) {
        $page_settings = PageSetting::first();
        $active_tab = request("tab", "branding");

        return view("admin.panels.website-setting", [
            "page_settings" => $page_settings,
            "active_tab" => $active_tab
        ]);
    }

    public function updateBranding(Request $request) {
        $page_settings = PageSetting::first();

        $validatedData = $request->validate([
            "logo" => "nullable|image|mimes:png,jpg,jpeg,svg|max:2048",
            'favicon' => 'nullable|image|mimes:png,ico|max:1024', 
        ]);

        if ($request->hasFile("logo")) {

            // Delete old logo
            if ($page_settings->logo && Storage::disk("public")->exists("branding/" . $page_settings->logo)) {
                Storage::disk("public")->delete("branding/" . $page_settings->logo);
            } 

            // Save new logo
            $logo_name = time() . "." . $request->file("logo")->getClientOriginalExtension();
            $request->file("logo")->storeAs("branding", $logo_name, "public");

            $page_settings->logo = $logo_name;
        }

         if ($request->hasFile("favicon")) {

            // Delete old favicon
            if ($page_settings->favicon && Storage::disk("public")->exists("branding/" . $page_settings->favicon)) {
                Storage::disk("public")->delete("branding/" .  $page_settings->favicon);
            } 

            // Save new favicon
            $favicon_name = time() . "." . $request->file("favicon")->getClientOriginalExtension();
            $request->file("favicon")->storeAs("branding", $favicon_name, "public");

            $page_settings->favicon = $favicon_name;
        }

        $page_settings->save();

        return redirect()->route("admin.websiteSetting", ["tab" => $request->query("tab", "branding")])
                  ->with('success', 'Branding updated successfully');
    }

    public function updateFooter(Request $request) {
        $page_settings = PageSetting::first();

        $validatedData = $request->validate([
            "show_newsletter" => "boolean",
            "footer_copyright" => "required|string|max:255",
            "contact_address" => "required|string|max:255",
            "contact_email" => "required|email",
            "contact_phone" => "required|string|max:20",
            "contact_map_iframe" => "required|string"
        ]);
      
        $page_settings->update($validatedData);   
        return redirect()->route("admin.websiteSetting", ["tab" => $request->query("tab", "footer")])
                  ->with('success', 'Footer updated successfully');
    }

    public function updateMessageSettings(Request $request) {
        $page_settings = PageSetting::first();

        $validatedData = $request->validate([
            "contact_email" => "required|email",
            "email_subject" => "required|string|max:255",
            "email_thankyou_message" => "required|string",
            "forgot_password_message" => "required|string"
        ]);

        $page_settings->update($validatedData);

        return redirect()->route("admin.websiteSetting", ["tab" => $request->query("tab", "message-settings")])
                    ->with('success', 'Message Settings updated successfully');
    }

    public function updateProductsDisplayLimit(Request $request) {
        $page_settings = PageSetting::first();

        if (!$page_settings) {
            return back()->withErrors("Page settings not found.");
        }

        $total_products = Product::count();

        if ($total_products === 0) {
            return back()->withErrors("No products available, so limits cannot be set.");
        }   

        $validatedData = $request->validate([
            "featured_products_limit" => "required|integer|min:0|max:$total_products",
            "latest_products_limit" => "required|integer|min:0|max:$total_products",
            "popular_products_limit" => "required|integer|min:0|max:$total_products",         
        ]);

        $page_settings->update($validatedData);

        return redirect()->route("admin.websiteSetting", ["tab" => $request->query("tab", "products-display-limit")])
                    ->with("success", "Products display limit updated successfully");
         
    }

    public function updateHomeSettings(Request $request) {
        $page_settings = PageSetting::first();

        $validatedData = $request->validate([
            "show_service_section" => "boolean",
            "show_welcome_product_section" => "boolean",
            "show_featured_product_section" => "boolean",
            "show_latest_product_section" => "boolean",
            "show_popular_product_section" => "boolean",
            "meta_title" => "required|string|max:255",
            "meta_keywords" => "required|string",
            "meta_description" => "required|string",
            "featured_products_title" => "required|string|max:255",
            "featured_products_subtitle" => "required|string",
            "latest_products_title" => "required|string|max:255",
            "latest_products_subtitle" => "required|string",
            "popular_products_title" => "required|string|max:255",
            "popular_products_subtitle" => "required|string",
            "newsletter_title" => "required|string|max:255",
        ]);

        $page_settings->update($validatedData);

        return redirect()->route("admin.websiteSetting", ["tab" => $request->query("tab", "home-settings")])
                    ->with("success", "Home settings updated successfully");       
    }

    public function updatePayment(Request $request) {
        $page_settings = PageSetting::first();

        if (!$page_settings) {
            return back()->withErrors("Page settings not found.");
        }

        $validatedData = $request->validate([
            "business_email" => "required|email|max:255",
            "bank_detail" => "required|string"
        ]);

        $page_settings->update($validatedData);

        return redirect()->route("admin.websiteSetting", ["tab" => $request->query("tab", "payments")])
                    ->with("success", "Payment setting updated successfully");   
    }
}
