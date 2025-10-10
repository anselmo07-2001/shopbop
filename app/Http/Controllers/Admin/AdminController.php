<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Customer;
use App\Models\EndCategory;
use App\Models\MidCategory;
use App\Models\PageSetting;
use App\Models\Payment;
use App\Models\Product;
use App\Models\TopCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function editProfile() {
        return view("admin.panels.edit-profile");
    }

    public function updateProfile(Request $request) {
        $validated_data = $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email",
            "phone_number" => "required|string|regex:/^[0-9+\s()-]+$/|min:10|max:15",
        ]);

        auth()->user()->update([
            "full_name" => $validated_data["name"],
            "email" => $validated_data["email"],
            "phone_number" => $validated_data["phone_number"],
        ]);

        return back()->with("success", "Successfully update profile information");
    }

    public function updatePassword(Request $request) {
        $validated_data = $request->validate([
            'current_password' => 'required',
            "new_password" => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($validated_data['current_password'], auth()->user()->password)) {
            return back()->with("error", "Your current password is incorrect");
        }

        auth()->user()->update([
            "password" => Hash::make($validated_data['new_password']),
        ]);

        return back()->with('success', 'Password updated successfully.');
    }

    
    public function subscriber() {
         return view("admin.panels.subscriber");
    }
}
