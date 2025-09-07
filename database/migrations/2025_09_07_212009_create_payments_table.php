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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->timestamp("payment_date");
            $table->string("txn_id")->nullable();
            $table->decimal("paid_amount", 10, 2);
            $table->string("card_number_last_4", 4)->nullable();
            $table->string("card_brand")->nullable();
            $table->text("bank_transaction_info")->nullable();
            $table->string("payment_method");
            $table->string("payment_status");
            $table->string("shipping_status");

            $table->foreignId("customer_id")->constrained()->onDelete("cascade");

            $table->string("order_number");
            $table->foreign("order_number")->references("order_number")->on("orders")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
