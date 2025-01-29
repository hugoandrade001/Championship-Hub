<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_a_id')->constrained('teams')->onDelete('cascade');
            $table->foreignId('team_b_id')->constrained('teams')->onDelete('cascade');
            $table->integer('score_team_a');
            $table->integer('score_team_b');
            $table->foreignId('championship_id')->constrained('championships')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
