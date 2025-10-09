<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PageSettingsController extends Controller
{
    public function index(Request $request) {
        $tab = request("tab", "about_us");

        return view("admin.panels.page-settings.index", compact("tab"));
    }
}
