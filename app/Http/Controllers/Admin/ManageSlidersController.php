<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ManageSlidersController extends Controller
{
    public function index() {
        return view("admin.panels.manage-sliders.index");
    }
}
