<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\CarouselConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManageSlidersController extends Controller
{
    public function index() {
        return view("admin.panels.manage-sliders.index");
    }

    public function create() {
        return view("admin.panels.manage-sliders.create");
    }

    public function store(Request $request) {
        $validated_data = $request->validate([
            "photo" => "required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048",
            "title" => "required|string|max:255",
            "subtitle" => "required|string",
            "button_text" => "required|string|max:255",
            "button_url" => "required|string",
            "position" => "required|in:start,center,end"
        ]);

        if ($request->hasFile("photo")) {
            $path = $request->file("photo")->store("carousel", "public");
            $validated_data["photo"] = basename($path); // only filename
        }

        CarouselConfig::create([
            "image_path" => $validated_data["photo"],
            "title" => $validated_data["title"],
            "subtitle" => $validated_data["subtitle"],
            "button_text" => $validated_data["button_text"],
            "button_link" => $validated_data["button_url"],
            "text_align" => $validated_data["position"]
        ]);

        return redirect()->route("admin.manageSliders.index")->with("success", "Slider added successfully!");
    }

    public function destroy(CarouselConfig $slider) {
        if ($slider->image_path && Storage::disk("public")->exists("carousel/" . $slider->image_path)) {
            Storage::disk("public")->delete("carousel/" . $slider->image_path);
        }

        $slider->delete();

        return redirect()->route('admin.manageSliders.index')->with('success', 'Slider deleted successfully!');
    }

    public function edit(CarouselConfig $slider) {
        return view("admin.panels.manage-sliders.edit", compact("slider"));
    }
    
    public function update(CarouselConfig $slider, Request $request) {
        $validated_data = $request->validate([
            "photo" => "nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048",
            "title" => "required|string|max:255",
            "subtitle" => "required|string",
            "button_text" => "required|string|max:255",
            "button_url" => "required|string",
            "position" => "required|in:start,center,end"
        ]);

        if ($request->hasFile("photo") && Storage::disk("public")->exists("carousel/" . $slider->image_path) ) {
           // delete the previous slider image
           Storage::disk("public")->delete("carousel/", $slider->image_path);

           // store the new slider image
           $path = $request->file("photo")->store("carousel", "public");
           $validated_data["photo"] = basename($path);
        }

        
        $slider->update([
            "image_path" => $validated_data["photo"] ?? $slider->image_path,
            "title" => $validated_data["title"],
            "subtitle" => $validated_data["subtitle"],
            "button_text" => $validated_data["button_text"],
            "button_link" => $validated_data["button_url"],
            "text_align" => $validated_data["position"]
        ]);

        return back()->with('success', 'Slider updated successfully!');
    }
}
