<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PageSettingsController extends Controller
{
    public function index() {
        return view("admin.panels.page-settings.index");
    }
}
