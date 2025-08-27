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
        Schema::table('products', function (Blueprint $table) {
            Schema::dropIfExists('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("original_price");
            $table->integer("current_price");
            $table->integer("quantity");
            $table->string("featured_photo");
            $table->longText("description")->nullable();
            $table->longText("short_description")->nullable();
            $table->longText("features")->nullable();
            $table->longText("condition")->nullable();
            $table->longText("return_policy")->nullable();
            $table->integer("total_views")->default(0);
            $table->boolean("is_featured")->default(false);
            $table->boolean("is_active")->default(true);
            $table->foreignId("end_category_id")->constrained()->onDelete("cascade");
            $table->timestamps();
        });
    }
};
