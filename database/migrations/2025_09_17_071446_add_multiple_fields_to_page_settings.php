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
            $table->boolean("show_service_section")->default(true);
            $table->boolean("show_featured_product_section")->default(true);
            $table->boolean("show_popular_product_section")->default(true);
            $table->boolean("show_welcome_product_section")->default(true);
            $table->boolean("show_latest_product_section")->default(true);
            
            $table->string("featured_products_title")->default("Featured Products");
            $table->text("featured_products_subtitle")->nullable();
            $table->string("latest_products_title")->default("Latest Product");
            $table->text("latest_products_subtitle")->nullable();
            $table->string("popular_products_title")->default("Popular Product");
            $table->text("popular_products_subtitle")->nullable();
            $table->string("newsletter_title")->default("Subscribe to our Newsletter");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_settings', function (Blueprint $table) {
            $table->dropColumn([
                "show_service_section",
                "show_featured_product_section",
                "show_popular_product_section",
                "show_welcome_product_section",
                "show_latest_product_section",
                "featured_products_title",
                "featured_products_subtitle",
                "latest_products_title",
                "latest_products_subtitle",
                "popular_products_title",
                "popular_products_subtitle",
                "newsletter_title"
            ]);
        });
    }
};
