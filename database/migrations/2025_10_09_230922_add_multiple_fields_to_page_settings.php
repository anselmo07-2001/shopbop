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
            $table->string("contact_title")->default("Contact Us");
            $table->string("contact_subtitle")->default("Have questions? We’d love to hear from you! Fill out the form below or reach us through our office details.");
            $table->string("contact_meta_title")->nullable();
            $table->text("contact_meta_keywords")->nullable();
            $table->text("contact_meta_description")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_settings', function (Blueprint $table) {
             $table->dropColumn([
                "contact_title",
                "contact_subtitle",
                "contact_meta_title",
                "contact_meta_keywords",
                "contact_meta_description"
            ]);
        });
    }
};
