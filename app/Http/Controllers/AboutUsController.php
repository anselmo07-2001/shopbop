<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutUsController extends Controller
{
    public function aboutUs(): View {
        return view("pages.about-us");
    }
}
