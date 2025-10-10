<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\EndCategory;
use App\Models\MidCategory;
use App\Models\PageSetting;
use App\Models\Payment;
use App\Models\Product;
use App\Models\TopCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    

    public function editProfile() {
        return view("admin.panels.edit-profile");
    }

    public function subscriber() {
         return view("admin.panels.subscriber");
    }
}
