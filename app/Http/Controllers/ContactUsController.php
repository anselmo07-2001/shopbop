<?php

namespace App\Http\Controllers;

use App\Models\PageSetting;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactUsController extends Controller
{
    public function contactUs(): View {
        $page_settings = PageSetting::all()->first();
        return view("pages.contact-us", compact("page_settings"));
    }
}
