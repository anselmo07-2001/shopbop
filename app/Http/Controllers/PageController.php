<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index() {
        $services = Service::all();
        $featured_products = Product::where("is_featured", 1)->get();
        $latest_products = Product::latest()->take(8)->get();
        $popular_products = Product::orderBy("total_views", "desc")->take(8)->get();

        return view("pages.index", [
            "services" => $services,
            "featured_products" => $featured_products,
            "latest_products" => $latest_products,
            "popular_products" => $popular_products
        ]);
        
    }
}
