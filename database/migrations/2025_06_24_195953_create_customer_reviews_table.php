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
        Schema::create('customer_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('place');
            $table->text('customer_message');
            $table->unsignedTinyInteger('rating')->default(5); // 1-5 star rating
            $table->string('company')->nullable(); 
            $table->tinyInteger('status')->default(1); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_reviews');
    }
};


// php artisan migrate --path=database/migrations/2025_06_24_195953_create_customer_reviews_table.php