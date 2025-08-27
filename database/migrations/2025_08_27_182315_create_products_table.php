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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("original_price");
            $table->integer("current_price");
            $table->integer("quantity");
            $table->string("featured_photo");
            $table->text("description");
            $table->string("short_description");
            $table->text("features");
            $table->text("condition");
            $table->text("return_policy");
            $table->integer("total_views");
            $table->boolean("is_featured");
            $table->boolean("is_active");
            $table->foreignId("end_category_id")->constrained()->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
