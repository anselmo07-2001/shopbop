<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingsController extends Controller
{
    public function store(Request $request) {
        $validated_data = $request->validate([
            "comment" => "required|string|min:5",
            "rating" => "required|in:1,2,3,4,5",
            "productId" => "required|exists:products,id"
        ]);

        $validated_data["customerId"] = auth("customer")->user()->id;

        Rating::create([
            "product_id" => $validated_data["productId"],
            "customer_id" => $validated_data["customerId"],
            "comment" => $validated_data["comment"],
            "rating" => $validated_data["rating"]
        ]);

        return back()->with("success", "Successfully submitted your review.");
    }

    public function update(Rating $rating, Request $request) {
        $validated_data = $request->validate([
            "comment" => "required|string|min:5",
            "rating" => "required|in:1,2,3,4,5",
        ]);

        // Optional: ensure the logged-in user owns this rating
        if ($rating->customer_id !== auth('customer')->id()) {
            abort(403, 'Unauthorized action.');
        }

        $rating->update([
            "comment" => $validated_data["comment"],
            "rating" => $validated_data["rating"]
        ]);

        return back()->with("success", "Successfully updated your review.");
    }
}
