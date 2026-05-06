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
        Schema::create('match3_games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_id'); // связь с таблицей games
            $table->integer('level'); // текущий уровень
            $table->integer('score')->default(0);
            $table->integer('moves_left');
            $table->string('field_size'); // например, "8x8"
            $table->text('field_state'); // сериализованные данные поля
            $table->timestamps();

            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('match3_games');
    }
};
