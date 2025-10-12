<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SubscriberController extends Controller
{
    public function store(Request $request) {
        $existing = Subscriber::where('email', $request->email)->first();

        if ($existing) {
            return back()->with('success', 'If this email is not yet verified, please check your inbox for confirmation.');
        }

        //validate the email, email should unique in the table subscriber
        $validated_data = $request->validate([
            "email" => "required|email|unique:subscribers,email"
        ]);

        //insert the value, the hast use Str:random(40)
        $subscriber = Subscriber::create([
            "email" => $validated_data["email"],
            "hash" => Str::random(40)
        ]);

        //send verification email
        $verifyUrl = route("newsletter.verify-subscription", ["hash" => $subscriber->hash]);

        Mail::raw("Please confirm your subcription by clicking this link: $verifyUrl", function($message) use ($subscriber) {
            $message->to($subscriber->email)
                    ->subject('Confirm your subscription');
        });

        return back()->with('success', 'Please check your email to confirm your subscription.');
    }

    public function verify($hash) {
        $subscriber = Subscriber::where("hash", $hash)->firstOrFail();

        if (!$subscriber->is_verified) {
            $subscriber->update([
                "is_verified" => true
            ]);

            $message = "Your subscription is confirmed!";
        }
        else {
            $message = "This email is already verified.";
        }

        return view("pages.subscription-confirmed", compact("message"));
    }

    
}
