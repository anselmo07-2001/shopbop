<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ManageSubscribers extends Controller
{
    public function index() {
        return view("admin.panels.subscribers.index");
    }
}
