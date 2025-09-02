<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(): View {
        $countries = Country::all();
        return view("auth.register", compact("countries"));
    }

    public function store(Request $request) {
        $countries = Country::pluck("id")->toArray();

        $validated = $request->validate([
            "full_name" => "required|string|max:255",
            "company_name" => "nullable|string|max:255",
            "email" => "required|email|unique:customers,email",
            "phone_number" => "required|regex:/^\+?[0-9\s\-\(\)]{10,20}$/",
            "address" => "required|string",
            "country" => ["required", Rule::in($countries) ],
            "city" => "required|string|max:255",
            "state" => "required|string|max:255",
            "zip" => "required|string|max:20",
            "password" => "required|min:8|confirmed",
        ]);

        $customer = Customer::create([
            "full_name" => $validated["full_name"],
            "company_name" => $validated["company_name"] ?? null,
            "email" => $validated["email"],
            "phone_number" => $validated["phone_number"],
            "address" => $validated["address"],
            "city" => $validated["city"],
            "country" => $validated["country"],
            "state" => $validated["state"],
            "zip" => $validated["zip"],
            "password" => bcrypt($validated["password"]),

            "billing_name" => $validated["full_name"],
            "billing_company_name" => $validated["company_name"],
            "billing_phone_number" => $validated["phone_number"],
            "billing_country" => $validated["country"],
            "billing_address" => $validated["address"],
            "billing_city" => $validated["city"],
            "billing_state" => $validated["state"],
            "billing_zip" => $validated["zip"],

            "shipping_name" => $validated["full_name"], 
            "shipping_company_name" => $validated["company_name"],
            "shipping_phone_number" => $validated["phone_number"],
            "shipping_country" => $validated["country"],
            "shipping_address" => $validated["address"],
            "shipping_city" => $validated["city"],
            "shipping_state" => $validated["state"],
            "shipping_zip" => $validated["zip"],        
        ]);

        Auth::login($customer);

        return redirect()->route("home")->with("success", "Account created and logged in!");
     }
}
