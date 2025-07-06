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
        Schema::create('scrolling_headings', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->string('color')->nullable(); // Text color
            $table->string('background')->nullable(); // Background color
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scrolling_headings');
    }
};



// php artisan migrate --path=database/migrations/2025_06_24_195940_create_scrolling_headings_table.php