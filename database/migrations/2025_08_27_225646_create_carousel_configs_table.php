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
        Schema::create('carousel_configs', function (Blueprint $table) {
            $table->id();
            $table->string("image_path");
            $table->string("title");
            $table->string("subtitle");
            $table->string("button_text");
            $table->string("button_link")->default("#");
            $table->enum('text_align', ['start', 'center', 'end'])->default('center');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carousel_configs');
    }
};
