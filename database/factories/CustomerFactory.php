<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fullName = $this->faker->name();

        return [
            // Basic info
            'full_name' => $fullName,
            'company_name' => $this->faker->company(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone_number' => $this->faker->phoneNumber(),
            'country' => $this->faker->country(),
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'zip' => $this->faker->postcode(),
            "password" => Hash::make("password"),
            "status" => "active",
            "remember_token" => Str::random(10),

             // Billing info
            'billing_name' => $fullName,
            'billing_company_name' => $this->faker->company(),
            'billing_phone_number' => $this->faker->phoneNumber(),
            'billing_country' => $this->faker->country(),
            'billing_address' => $this->faker->streetAddress(),
            'billing_city' => $this->faker->city(),
            'billing_state' => $this->faker->state(),
            'billing_zip' => $this->faker->postcode(),

            // Shipping info
            'shipping_name' => $fullName,
            'shipping_company_name' => $this->faker->company(),
            'shipping_phone_number' => $this->faker->phoneNumber(),
            'shipping_country' => $this->faker->country(),
            'shipping_address' => $this->faker->streetAddress(),
            'shipping_city' => $this->faker->city(),
            'shipping_state' => $this->faker->state(),
            'shipping_zip' => $this->faker->postcode(),     
        ];
    }
}
