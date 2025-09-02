<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();

            // Basic customer info
            $table->string("full_name");
            $table->string("company_name")->nullable();
            $table->string("email")->unique();
            $table->string("phone_number")->nullable();
            $table->string("country");
            $table->string("address");
            $table->string("city");
            $table->string("state");
            $table->string("zip");

            // Billing address
            $table->string("billing_name");
            $table->string("billing_company_name")->nullable();
            $table->string("billing_phone_number")->nullable();
            $table->string("billing_country");
            $table->string("billing_address");
            $table->string("billing_city");
            $table->string("billing_state");
            $table->string("billing_zip");

            // Shipping address
            $table->string("shipping_name");
            $table->string("shipping_company_name")->nullable();
            $table->string("shipping_phone_number")->nullable();
            $table->string("shipping_country");
            $table->string("shipping_address");
            $table->string("shipping_city");
            $table->string("shipping_state");
            $table->string("shipping_zip");

            $table->foreignId("account_id")->constrained()->onDelete("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
