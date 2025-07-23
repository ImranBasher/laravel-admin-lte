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
        Schema::create('sub_service_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_category_id');
            $table->string('sub_service_name');
            $table->string('banner_short_title')->nullable();
            $table->string('banner_long_title')->nullable();
            $table->text('banner_description')->nullable();
            $table->text('service_introduction_description')->nullable();
            $table->text('key_services_list')->nullable();
            $table->text('key_service_description')->nullable();
            $table->text('features_and_benefit_list')->nullable();
            $table->text('features_and_benefit_description')->nullable();
            $table->text('how_do_we_work_list')->nullable();
            $table->text('how_do_we_work_description')->nullable();
            $table->text('expected_result_list')->nullable();
            $table->text('expected_result_description')->nullable();
            $table->integer('quantity')->nullable();
            $table->text('svg_icon')->nullable();
            
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            // Corrected foreign key constraint
            $table->foreign('service_category_id')
                ->references('id')
                ->on('service_categories')  // Added the table name here
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sub_service_categories', function (Blueprint $table) {
            $table->dropForeign(['service_category_id']);
        });
        
        Schema::dropIfExists('sub_service_categories');
    }
};


// php artisan migrate --path=database/migrations/2025_06_24_195932_create_sub_service_categories_table.php