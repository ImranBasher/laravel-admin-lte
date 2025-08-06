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
        // Schema::create('service_price_packages', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('title');
        //     $table->string('short_description_start');
        //     $table->string('short_description_middle');
        //     $table->string('short_description_end');
        //     $table->tinyInteger('status')->default(1);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('service_price_packages');
    }
};
