<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\PageSetting;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqController extends Controller
{
    public function faq(): View {
        $faqs = Faq::all();
        $faq_settings = PageSetting::select([
            "faq_title",
            "faq_subtitle",
            "faq_meta_title",
            "faq_meta_keywords",
            "faq_meta_description",
        ])->firstOrFail();

        return view("pages.faq", [
            "faqs" => $faqs,
            "faq_settings" => $faq_settings
        ]);
    }
}
