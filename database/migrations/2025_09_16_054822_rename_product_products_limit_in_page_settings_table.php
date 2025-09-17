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
            if (Schema::hasColumn('page_settings', 'product_products_limit')) {
                $table->renameColumn('product_products_limit', 'popular_products_limit');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_settings', function (Blueprint $table) {
            if (Schema::hasColumn('page_settings', 'popular_products_limit')) {
                $table->renameColumn('popular_products_limit', 'product_products_limit');
            }
        });
    }
};
