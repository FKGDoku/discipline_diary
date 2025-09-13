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
        Schema::create('discipline_diaries', function (Blueprint $table) {
            $table->id();
            $table->date('date')->default(now());
            $table->unsignedInteger('it_minutes');
            $table->unsignedInteger('music_minutes');
            $table->unsignedInteger('english_minutes');
            $table->unsignedInteger('reading_minutes');
            $table->unsignedInteger('sport_approach');
            $table->unsignedInteger('total_minutes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discipline_diaries');
    }
};
