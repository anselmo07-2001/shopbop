<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function hadnleLogoutAdmin(Request $request) {
        Auth::guard("admin")->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.admin')->with("success", "You have been logged out!");
    }


    public function handleLoginAdmin(Request $request) {
        $cred = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        if (Auth::guard("admin")->attempt($cred)) {
            $request->session()->regenerate();
            return redirect()->route("admin.dashboard")->with("success", "You have been logged in!");
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }


    public function loginCustomer(Request $request) {
        $cred = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $customer = Customer::where("email", $cred["email"])->first();

        if ($customer && $customer->status == "inactive") {
            return back()->withErrors([
                "email" => "Your account has been disabled by the admin. Please contact support for assistance." 
            ])->withInput();
        }

        $cred = array_merge($cred, ["status" => 1]);  
           
        if (Auth::guard("customer")->attempt($cred, $request->filled("remember"))) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'))->with('success', 'Customer logged in!');
        }
        
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }


    public function logoutCustomer(Request $request) {
        Auth::guard("customer")->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/")->with("success", "You have been logged out!");
    }

    public function login(): View {
        return view("auth.login");
    }

    public function loginAdmin() {
        return view("admin.auth.login");
    }
}
