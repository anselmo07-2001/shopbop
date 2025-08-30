<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqController extends Controller
{
    public function faq(): View {
        $faqs = Faq::all();

        return view("pages.faq", compact("faqs"));
    }
}
