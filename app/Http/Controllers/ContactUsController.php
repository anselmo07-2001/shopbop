<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactUsController extends Controller
{
    public function contactUs(): View {
        return view("pages.contact-us");
    }
}
