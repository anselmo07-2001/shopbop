<?php

namespace App\Http\Controllers;

use App\Models\PageSetting;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutUsController extends Controller
{
    public function aboutUs(): View {
        $pageSetting = PageSetting::first();

        return view("pages.about-us", compact("pageSetting"));
    }
}
