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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // references id on users
            $table->string('profession')->nullable();
            $table->string('image')->nullable(); // profile image filename
            $table->string('phone')->nullable();
            $table->text('bio')->nullable(); // short description
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
//php artisan migrate --path=database/migrations/2025_07_06_181840_create_profiles_table.php