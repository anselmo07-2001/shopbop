<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function loginCustomer(Request $request) {
        $cred = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        if (Auth::guard("customer")->attempt($cred, $request->filled("remember"))) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'Customer logged in!');
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
}
