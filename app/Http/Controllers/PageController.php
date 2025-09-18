<?php

namespace App\Http\Controllers;

use App\Models\CarouselConfig;
use App\Models\PageSetting;
use App\Models\Product;
use App\Models\Service;
use App\Models\TopCategory;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index() {
        $page_settings = PageSetting::select([
            "featured_products_limit", 
            "latest_products_limit",
            "popular_products_limit",
            "show_service_section", 
            "show_featured_product_section", 
            "show_popular_product_section", 
            "show_welcome_product_section", 
            "show_latest_product_section",  
            "featured_products_title", 
            "featured_products_subtitle", 
            "latest_products_title", 
            "latest_products_subtitle", 
            "popular_products_title", 
            "popular_products_subtitle", 
        ])->first();


        $services = Service::all();
        $featured_products = Product::where("is_featured", 1)
                                ->take($page_settings->featured_products_limit)->get();
        $latest_products = Product::latest()
                                ->take($page_settings->latest_products_limit)->get();
        $popular_products = Product::orderBy("total_views", "desc")
                                ->take($page_settings->popular_products_limit)->get();

        
        $carousel = CarouselConfig::all();
    
        return view("pages.index", [
            "services" => $services,
            "featured_products" => $featured_products,
            "latest_products" => $latest_products,
            "popular_products" => $popular_products,
            "carousel" => $carousel,
            "page_settings" => $page_settings
        ]);
        
    }
}
