<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        $teams = [
            ['name' => 'Team A'],
            ['name' => 'Team B'],
            ['name' => 'Team C'],
            ['name' => 'Team D'],
        ];

        foreach ($teams as $team) {
            Team::firstOrCreate($team);
        }
    }
}
