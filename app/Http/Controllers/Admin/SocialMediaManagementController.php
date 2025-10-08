<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialMediaManagementController extends Controller
{
    public function index() {
        $socials = Social::all();
        return view("admin.panels.social-media.index", compact("socials"));
    }

    public function update(Request $request) {
        $validated_data = $request->validate([
            "Facebook" => "nullable|url",
            "X" => "nullable|url",
            "LinkedIn" => "nullable|url",
            "Pinterest" => "nullable|url",
            "YouTube" => "nullable|url",
            "Instagram" => "nullable|url",
            "Tumblr" => "nullable|url",
            "Reddit" => "nullable|url",
        ]);

        foreach($validated_data as $name => $url) {
            Social::where("name", $name)->update([
                "url" => $url
            ]);
        }

        return back()->with('success', 'Social media links updated successfully!');
    }
}
