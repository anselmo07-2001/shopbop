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
        Schema::table('page_settings', function (Blueprint $table) {
            $table->unsignedInteger("featured_products_limit")->default(0);
            $table->unsignedInteger("latest_products_limit")->default(0);
            $table->unsignedInteger("product_products_limit")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_settings', function (Blueprint $table) {
            $table->dropColumn([
                "featured_products_limit",
                "latest_products_limit",
                "product_products_limit"
            ]);
        });
    }
};
