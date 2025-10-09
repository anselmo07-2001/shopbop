<?php

namespace App\Http\Controllers;

use App\Models\PageSetting;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactUsController extends Controller
{
    public function contactUs(): View {
        $contact_settings = PageSetting::select([
            "contact_email",
            "contact_phone",
            "contact_address",
            "contact_map_iframe",
            "contact_title",
            "contact_subtitle",
            "contact_meta_title",
            "contact_meta_keywords",
            "contact_meta_description",
        ])->firstOrFail();

        return view("pages.contact-us", compact("contact_settings"));
    }
}
