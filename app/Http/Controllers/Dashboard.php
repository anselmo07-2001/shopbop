<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Dashboard extends Controller
{

    public function updateAddress(Request $request) {
  
    }


    public function updateProfile(Request $request) {
        $user = auth()->user();
        $countries = Country::all()->pluck("id")->toArray();

        $validatedData = $request->validate([
            "full_name" => "required|string|max:255",
            "company_name" => "nullable|string|max:255",
            'email' => ['required', 'email', Rule::unique('customers', 'email')->ignore($user->id)],
            "phone_number" => "required|regex:/^\+?[0-9\s\-\(\)]{10,20}$/",
            "address" => "required|string",
            "country_id" => ["required", Rule::in($countries) ],
            "city" => "required|string|max:255",
            "state" => "required|string|max:255",
            "zip" => "required|string|max:20",
        ]);

        
        $fieldsToUpdate = [
            'full_name' => $validatedData['full_name'],
            'company_name' => $validatedData['company_name'] ?? null,
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phone_number'],
            'address' => $validatedData['address'],
            'country_id' => $validatedData['country_id'],
            'city' => $validatedData['city'],
            'state' => $validatedData['state'],
            'zip' => $validatedData['zip'],
        ];

        $user->update($fieldsToUpdate);
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }


    public function index() {
        $user = auth()->user();
        $countries = Country::all()->toArray();

        return view("pages.dashboard", [
            "user" => $user,   
            "countries" => $countries
        ]);
    }
}
