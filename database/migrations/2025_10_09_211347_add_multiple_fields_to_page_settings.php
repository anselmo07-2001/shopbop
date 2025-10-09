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
              $table->string("faq_title")->default("Frequently Asked Questions");
              $table->string("faq_subtitle")->default("Here are some of the most common questions our customers ask. Click on a question to see the answer.");
              $table->string("faq_meta_title")->nullable();
              $table->text("faq_meta_keywords")->nullable();
              $table->text("faq_meta_description")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_settings', function (Blueprint $table) {
            $table->dropColumn([
                "faq_title",
                "faq_subtitle",
                "faq_meta_title",
                "faq_meta_keywords",
                "faq_meta_description"
            ]);
        });
    }
};
