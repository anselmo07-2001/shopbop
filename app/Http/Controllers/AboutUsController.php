<?php

namespace App\Http\Controllers;

use App\Models\PageSetting;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutUsController extends Controller
{
    public function aboutUs(): View {
        $about_us_settings = PageSetting::select([
            "about_us_title",
            "about_us_content",
            "about_us_meta_title",
            "about_us_meta_keywords",
            "about_us_meta_description",
        ])->firstOrFail();

    
        return view("pages.about-us", compact("about_us_settings"));
    }
}
