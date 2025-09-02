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
        Schema::table('customers', function (Blueprint $table) {
            // Remove the foreign key
            if (Schema::hasColumn('customers', 'account_id')) {
                $table->dropForeign(['account_id']);
                $table->dropColumn('account_id');
            }

            // Add auth-related fields
            $table->string('password')->after('zip');
            $table->enum("status", ["active", "inactive"])->default('active')->after('password');
            $table->rememberToken()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->foreignId('account_id')->constrained()->onDelete('cascade');

            // Remove newly added columns
            $table->dropColumn(['password', 'status', 'remember_token']);
        });
    }
};
