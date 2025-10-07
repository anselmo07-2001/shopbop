<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicesManagementController extends Controller
{
    public function index() {
        return view("admin.panels.services.index");
    }

    public function create() {
        return view("admin.panels.services.create");
    }

    public function store(Request $request) {
        $validated_data = $request->validate([
            "photo" => "required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048",
            "title" => "required|string|max:255",
            "content" => "required|string|min:5"
        ]);

        if ($request->hasFile("photo")) {
            $path = $request->file("photo")->store("services", "public");
            $validated_data["photo"] = basename($path);
        }

        Service::create([
            "photo" => $validated_data["photo"],
            "title" => $validated_data["title"],
            "content" => $validated_data["content"]
        ]);

        return redirect()->route("admin.services.index")->with("success", "Created service successfully.");
    }

    public function destroy(Service $service) {
        if ($service->photo && Storage::disk("public")->exists("services/" . $service->photo)) {
            Storage::disk("public")->delete("services/" . $service->photo);
        }

        $service->delete();

        return back()->with("success", "Deleted service successfully.");
    }

    public function edit(Service $service) {
        return view("admin.panels.services.edit", compact("service"));
    }

    public function update(Service $service, Request $request) {
        $validated_data = $request->validate([
            "photo" => "nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048",
            "title" => "required|string|max:255",
            "content" => "required|string|min:5"
        ]);

        if ($request->hasFile("photo")) {
            if (!empty($service->photo) && Storage::disk("public")->exists("services/" . $service->photo)) {
                Storage::disk("public")->delete("services/" . $service->photo);
            }

            $path = $request->file("photo")->store("services", "public");
            $validated_data["photo"] = basename($path);
        }

        $service->update([
            "photo" => $validated_data["photo"] ?? $service->photo,
            "title" => $validated_data["title"],
            "content" => $validated_data["content"]
        ]);

        return back()->with("success", "Updated service successfully.");
    }
}
