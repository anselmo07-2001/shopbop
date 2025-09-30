<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\Size;
use App\Models\TopCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductManagementController extends Controller
{
    public function index() {
        return view("admin.panels.product-management.index");
    }

    public function create() {
        $top_categories = TopCategory::all();
        $sizes = Size::all();
        $colors = Color::all();

        return view("admin.panels.product-management.create", [
            "top_categories" => $top_categories,
            "sizes" => $sizes,
            "colors" => $colors
        ]);
    }

    public function destroy(Product $product) {
        // Delete feature photo
        if ($product->featured_photo && Storage::disk("public")->exists("products/" . $product->featured_photo)) {
            Storage::disk("public")->delete("products/" . $product->featured_photo);
        }

        // Delete other photos
        $other_photos = ProductGallery::where("product_id", $product->id)->get();
        foreach($other_photos as $other_photo) {
            $path = "gallery/" . $other_photo->image_path;

            if (Storage::disk("public")->exists($path)) {
                Storage::disk("public")->delete($path);
            }
        }

        $product->delete();
        return back()->with("success", "Product deleted succesfully");
    }

    public function edit(Product $product) {
        $top_categories = TopCategory::all();
        $sizes = Size::all();
        $colors = Color::all();
    }
}
