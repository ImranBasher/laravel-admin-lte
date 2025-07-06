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
        Schema::create('frequently_asked_questions', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->text('answer');
            $table->foreignId('sub_service_category_id')
                  ->constrained('sub_service_categories')
                  ->onDelete('cascade');
            $table->tinyInteger('status')->default(1); // 1=active, 0=inactive
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('frequently_asked_questions', function (Blueprint $table) {
            $table->dropForeign(['sub_service_category_id']);
        });
        
        Schema::dropIfExists('frequently_asked_questions');
    }
};

//php artisan migrate --path=database/migrations/2025_06_24_200010_create_frequently_ask_questions_table.php