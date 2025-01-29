<?php

namespace App\Http\Controllers;

use App\Models\Championship;
use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\Request;

class ChampionshipController extends Controller
{
    public function index()
    {
        return response()->json(Championship::with('games')->get());
    }

    public function store(Request $request)
    {
        $championship = Championship::create($request->all());
        return response()->json($championship, 201);
    }

    public function show(Championship $championship)
    {
        return response()->json($championship->load('games'));
    }

    public function update(Request $request, Championship $championship)
    {
        $championship->update($request->all());
        return response()->json($championship);
    }

    public function destroy(Championship $championship)
    {
        $championship->delete();
        return response()->json(['message' => 'Championship deleted successfully.'], 204);
    }
}
