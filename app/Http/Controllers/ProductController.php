<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function show($id): View {
        $product = Product::findorFail($id);
 
        return view("pages.product", compact("product"));
    }
}
