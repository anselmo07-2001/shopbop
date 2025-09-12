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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId("product_id")->constrained()->onDelete("cascade");
            $table->foreignId("customer_id")->constrained()->onDelete("cascade");
            $table->unique(["product_id", "customer_id"]);
            $table->text("comment")->nullable();
            $table->integer("rating")->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
