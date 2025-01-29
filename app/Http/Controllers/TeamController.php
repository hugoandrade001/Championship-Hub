<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index()
    {
        return response()->json(Team::all());
    }

    public function store(Request $request)
    {
        if (Team::count() >= 8) {
            return response()->json(['error' => 'A maximum of 8 teams is allowed.'], 400);
        }

        $team = Team::create($request->all());
        return response()->json($team, 201);
    }

    public function show($id)
    {
        $team = Team::find($id);

        if (!$team) {
            return response()->json(['error' => 'Team not found.'], 404);
        }

        return response()->json($team);
    }

    public function update(Request $request, $id)
    {
        $team = Team::find($id);

        if (!$team) {
            return response()->json(['error' => 'Team not found.'], 404);
        }

        $team->update($request->all());
        return response()->json($team);
    }

    public function destroy($id)
    {
        $team = Team::find($id);

        if (!$team) {
            return response()->json(['error' => 'Team not found.'], 404);
        }

        $team->delete();
        return response()->json(['message' => 'Team deleted successfully.'], 204);
    }
}
