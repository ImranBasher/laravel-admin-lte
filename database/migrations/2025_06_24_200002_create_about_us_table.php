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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();

            // Description sections
            $table->text('description_start');
            $table->text('description_middle')->nullable();
            $table->text('description_end')->nullable();

            // Mechanics titles
            $table->string('mechanics_title_start');
            $table->string('mechanics_title_end')->nullable();
            $table->text('mechanics_description')->nullable();

            // Standard fields
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
//php artisan migrate --path=database/migrations/2025_06_24_200002_create_about_us_table.php
