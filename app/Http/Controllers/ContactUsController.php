<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\PageSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

    public function sendMessage(Request $request) {
        $contact_email = PageSetting::firstOrFail()->contact_email;
    
        $request->validate([
            "full_name" => "required|string|max:255",
            "email" => "required|email",
            "phone_number" => "required|regex:/^\+?[0-9\s\-\(\)]{10,20}$/",
            "message" => "required|string"
        ]);

        $data = $request->only("full_name", "email", "phone_number", "message");

        Mail::to($contact_email)->queue(new ContactMail($data));

        return back()->with("success", "Message sent successfully");
    }
}
