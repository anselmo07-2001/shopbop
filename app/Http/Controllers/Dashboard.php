<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index() {
        $user = auth()->user();
        $countries = Country::all()->toArray();


        return view("pages.dashboard", [
            "user" => $user,   
            "countries" => $countries
        ]);
    }
}
