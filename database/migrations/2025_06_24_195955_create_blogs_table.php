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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('short_title')->nullable(); // ➕ added
            $table->string('author')->nullable();       // ➕ added
            $table->longText('description_1')->nullable(); // ➕ added
            $table->longText('description_2')->nullable(); // ➕ added
            $table->longText('description_3')->nullable(); // ➕ added
            $table->longText('description_4')->nullable(); // ➕ added
            $table->longText('description_5')->nullable(); // ➕ added
            $table->longText('description_6')->nullable(); // ➕ added
            $table->longText('description_7')->nullable(); // ➕ added
            // $table->foreignId('author_id')->nullable()->constrained('authors')->onDelete('cascade');
            // $table->date('published_at')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('blogs', function (Blueprint $table) {
        //     $table->dropForeign(['author_id']);
        // });
        Schema::dropIfExists('blogs');
    }
};


// php artisan migrate --path=database/migrations/2025_06_24_195955_create_blogs_table.php