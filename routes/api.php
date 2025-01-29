<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ChampionshipController;

// Rota de teste da API
Route::get('/', function () {
    return response()->json(['message' => 'API funcionando!']);
});

// CRUD de Times (Limite de 8 times)
Route::apiResource('teams', TeamController::class);

// CRUD de Jogos
Route::apiResource('games', GameController::class);

// CRUD de Campeonatos
Route::apiResource('championships', ChampionshipController::class);

// Recuperar todos os campeonatos anteriores e seus jogos
Route::get('/championships', [ChampionshipController::class, 'index']);

// Gerar um novo campeonato automaticamente
Route::post('/championships/generate', [ChampionshipController::class, 'generateChampionship']);

