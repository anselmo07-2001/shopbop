<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class StripePaymentController extends Controller
{
    public function checkout() {
        // Set Stripe secret key
        Stripe::setApiKey(config("services.stripe.secret"));

        // Create a PaymentIntent - amount is in cents
        $intent = PaymentIntent::create([
            "amount" => 5000,
            "currency" => "usd",
            "description" => "Test Payments from laravel",
            "automatic_payment_methods" => ["enabled" => true]
        ]);

        return view('checkout', [
            'clientSecret' => $intent->client_secret,
        ]);
    }
}
