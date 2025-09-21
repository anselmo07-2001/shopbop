<?php

namespace App\Http\Controllers\Admin\ShopSettings;
use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index() {
        return view("admin.panels.shop-settings.country");
    }

    public function create() {
        return view("admin.panels.shop-settings.update-forms.country.addCountry");
    }

    public function store(Request $request) {
         $validatedData = $request->validate([
            "country_name" => "required|string|max:255|unique:countries,country_name" 
        ],[
            "country_name.unique" => "This country name already exists.",
        ]);

        Country::create([
            "country_name" => $validatedData["country_name"]
        ]);

        return redirect()->route('admin.shopSetting.country.index')
            ->with("success", "Added country successfully");
    }

    public function destroy(Country $country) {
        $country->delete();
        return back()->with("success", "Country deleted succesfully");
    }

    public function edit(Country $country) {
        return view("admin.panels.shop-settings.update-forms.country.updateCountry", compact("country"));
    }

    public function update(Country $country, Request $request) {
        $validatedData = $request->validate([
            "country_name" => "required|string|max:255|unique:countries,country_name," . $country->id
        ],[
            "country_name.unique" => "This size name already exists.",
        ]);

        $fieldsToUpdate = [
            "country_name" => $validatedData["country_name"]
        ];

        $country->update($fieldsToUpdate);

        return back()->with("success", "Country updated successfully");
    }
}


