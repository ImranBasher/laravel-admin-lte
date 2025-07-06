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
        Schema::create('footer_banners', function (Blueprint $table) {
            $table->id();
            $table->string('title_a');
            $table->string('title_b');
            $table->string('phone');
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            
            // Recommended additional fields:

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_banners');
    }
};
//php artisan migrate --path=database/migrations/2025_06_24_195959_create_footer_banners_table.php