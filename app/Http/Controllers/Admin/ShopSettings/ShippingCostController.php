<?php

namespace App\Http\Controllers\Admin\ShopSettings;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\ShippingCost;
use Illuminate\Http\Request;

class ShippingCostController extends Controller
{
    public function index() {
          $countries = Country::all();

          return view("admin.panels.shop-settings.shipping-cost",[
              "countries" => $countries
          ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            "country_id" => "required|integer|unique:shipping_costs,country_id",
            "amount" => "required|numeric|min:0.01"
        ],[
            "country_id.unique" => "The country shipping cost is already set."
        ]);

        ShippingCost::create($validatedData);

        return back()->with("success", "Added a country shipping cost successfully");
    }

    public function destroy(ShippingCost $country) {
        $country->delete();
        return back()->with("success", "Country shipping cost deleted succesfully");
    }

    public function edit(ShippingCost $shippingCost) {
        $countries = Country::all();

        return view("admin.panels.shop-settings.update-forms.shippingCost.updateShippingCost", [
            "shippingCost" => $shippingCost,
            "countries" => $countries
        ]);
    }

    public function update(ShippingCost $shippingCost, Request $request) {
        $validatedData = $request->validate([
            "country_id" => "required|integer|unique:shipping_costs,country_id," . $shippingCost->id,
            "amount" => "required|numeric|min:0.01"
        ],[
            "country_id.unique" => "The country shipping cost is already set."
        ]);

        $shippingCost->update($validatedData);
         
        return back()->with("success", "Updated country shipping cost successfully");
    }
}
