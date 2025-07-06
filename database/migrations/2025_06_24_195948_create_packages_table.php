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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('duration');
            $table->string('title');
            $table->boolean('popularity')->default(false); // or tinyInteger for multiple levels
            $table->decimal('price', 10, 2);
            $table->text('services'); // JSON or text field for services list
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            
            // Recommended additional fields:
            $table->string('short_description')->nullable();
            $table->integer('sort_order')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
