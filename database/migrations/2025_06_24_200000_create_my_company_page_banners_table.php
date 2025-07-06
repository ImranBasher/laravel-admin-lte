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
        Schema::create('my_company_page_banners', function (Blueprint $table) {
            $table->id();
            $table->string('short_title');
            $table->string('long_title');
            $table->tinyInteger('status')->default(1); // Active/inactive status
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_company_page_banners');
    }
};
