<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class ServicesManagementController extends Controller
{
    public function index() {
        return view("admin.panels.services.index");
    }
}
