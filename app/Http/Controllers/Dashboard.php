<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Customer;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Dashboard extends Controller
{
    public function updatePassword(Request $request) {

        $validator = Validator::make($request->all(), [
            "current_password" => "required",
            "password" => "required|string|min:8|confirmed",
        ]);

        if ($validator->fails()) {
            return redirect()
                    ->route("dashboard.index", ["tab" => "v-pills-password"])
                    ->withErrors($validator)
                    ->withInput();  
        }

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route("dashboard.index", ["tab" => "v-pills-password"])->withErrors([
                "current_password" => "Your current password does not match in our records."
            ])->withInput();
        }

        $user->update([
            "password" => Hash::make($request->password)
        ]);

        return redirect()->route("dashboard.index", ["tab" => "v-pills-password"])->with("success", "Password updated successfully");
    }


    public function updateAddress(Request $request) {
        $user = auth()->user(); 
        $countries = Country::all()->pluck("id")->toArray();

        $validator = Validator::make($request->all(), [
            "shipping_name" => "required|string|max:255",
            "shipping_company_name" => "nullable|string|max:255",
            "shipping_phone_number" => "required|regex:/^\+?[0-9\s\-\(\)]{10,20}$/",
            "shipping_address" => "required|string",
            "shipping_country" => ["required", Rule::in($countries) ],
            "shipping_city" => "required|string|max:255",
            "shipping_state" => "required|string|max:255",
            "shipping_zip" => "required|string|max:20",

            "billing_name" => "required|string|max:255",
            "billing_company_name" => "nullable|string|max:255",
            "billing_phone_number" => "required|regex:/^\+?[0-9\s\-\(\)]{10,20}$/",
            "billing_address" => "required|string",
            "billing_country" => ["required", Rule::in($countries) ],
            "billing_city" => "required|string|max:255",
            "billing_state" => "required|string|max:255",
            "billing_zip" => "required|string|max:20",
        ]);

        if ($validator->fails()) {
            return redirect()
                    ->route("dashboard.index", ["tab" => "v-pills-billing"])
                    ->withErrors($validator)
                    ->withInput();             
        }

        $validatedData = $validator->validated();

        $fieldsToUpdate = [
            'shipping_name' => $validatedData['shipping_name'],
            'shipping_company_name' => $validatedData['shipping_company_name'] ?? null,
            'shipping_phone_number' => $validatedData['shipping_phone_number'],
            'shipping_address' => $validatedData['shipping_address'],
            'shipping_country' => $validatedData['shipping_country'],
            'shipping_city' => $validatedData['shipping_city'],
            'shipping_state' => $validatedData['shipping_state'],
            'shipping_zip' => $validatedData['shipping_zip'],

            'billing_name' => $validatedData['billing_name'],
            'billing_company_name' => $validatedData['billing_company_name'] ?? null,
            'billing_phone_number' => $validatedData['billing_phone_number'],
            'billing_address' => $validatedData['billing_address'],
            'billing_country' => $validatedData['billing_country'],
            'billing_city' => $validatedData['billing_city'],
            'billing_state' => $validatedData['billing_state'],
            'billing_zip' => $validatedData['billing_zip'],
        ];

        $user->update($fieldsToUpdate);
        return redirect()->route("dashboard.index", ["tab" => "v-pills-billing"])->with('success', 'Profile updated successfully!');
    }


    public function updateProfile(Request $request) {
        $user = auth()->user(); 
        $countries = Country::all()->pluck("id")->toArray();

        $validator = Validator::make($request->all(), [
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

        if ($validator->fails()) {
           return redirect()
                    ->route("dashboard.index", ["tab" => "v-pills-profile"])
                    ->withErrors($validator)
                    ->withInput();  
        }


        $validatedData = $validator->validated();
       
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
        return redirect()->route("dashboard.index", ["tab" => "v-pills-profile"])->with('success', 'Profile updated successfully!');
    }


    public function index(Request $request) {
        $activeTab = $request->query('tab', "v-pills-profile");
        
        $user = auth()->user();
        $countries = Country::all()->toArray();
        $customer_orders = Customer::with(["orders.payments", "orders.product"])
                    ->where("id", $user->id)
                    ->first();

        $grouped = $customer_orders->orders->groupBy('order_number');

        // manual pagination on groups
        $page = request('page', 1);
        $perPage = 3;

        $pagedGroups = $grouped->slice(($page - 1) * $perPage, $perPage);

        $ordersByOrderNumber = new \Illuminate\Pagination\LengthAwarePaginator(
            $pagedGroups,
            $grouped->count(),
            $perPage,
            $page,
            ['path' => request()->url() ]
        );

        // extra safety: append tab so ->links() also has it
        $ordersByOrderNumber->appends(['tab' => $activeTab]);

        return view("pages.dashboard", [
            "user" => $user,   
            "countries" => $countries,
            "orders" => $ordersByOrderNumber,
            "activeTab" => $activeTab
        ]);
    }
}
