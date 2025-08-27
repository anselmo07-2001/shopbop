<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index() {
        $services = Service::all();
        return view("pages.index", compact("services"));
    }
}
