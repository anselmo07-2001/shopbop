<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function cart(): View {
        return view("pages.cart");
    }
}
