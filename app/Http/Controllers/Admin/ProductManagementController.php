<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProductManagementController extends Controller
{
    public function index() {
        return view("admin.panels.product-management.index");
    }

    public function create() {
        return view("admin.panels.product-management.create");
    }
}
