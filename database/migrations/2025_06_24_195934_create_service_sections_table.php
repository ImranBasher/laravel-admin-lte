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
        Schema::create('service_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('title_start')->nullable();
            $table->string('title_middle')->nullable();
            $table->string('title_end')->nullable();
            $table->text('description')->nullable(); 
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_sections');
    }
};


// php artisan migrate --path=database/migrations/2025_06_24_195934_create_service_sections_table.php
