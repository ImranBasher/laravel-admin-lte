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
        Schema::create('main_banners', function (Blueprint $table) {
            $table->id();
            $table->string('short_title');
            $table->string('long_title');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_banners');
    }
};


//php artisan migrate --path=database/migrations/2025_06_24_195955_create_main_banners_table.php