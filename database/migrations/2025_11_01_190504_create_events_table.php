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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('time');
            $table->foreignId('sport_id')
                  ->constrained('sports')
                  ->cascadeOnDelete();
            $table->foreignId('team_left_id')
                  ->constrained('commands')
                  ->cascadeOnDelete();
            $table->foreignId('team_right_id')
                  ->constrained('commands')
                  ->cascadeOnDelete();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
