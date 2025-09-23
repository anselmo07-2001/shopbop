<?php

namespace App\Http\Controllers\Admin\ShopSettings;
use App\Http\Controllers\Controller;
use App\Models\ShippingCostAll;
use Illuminate\Http\Request;

class ShippingCostsAllController extends Controller
{
    public function update(Request $request) {
        $validatedData = $request->validate([
            "amount" => "required|numeric|min:1"
        ]);

        $shipping_cost_all = ShippingCostAll::firstOrFail();
        $shipping_cost_all->update($validatedData);

        return back()->with("success", "Global shipping cost updated successfully.");
    }
}
