<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        Game::insert([
            [
                'team_a_id' => 1,
                'team_b_id' => 2,
                'championship_id' => 1,
                'score_team_a' => 2,
                'score_team_b' => 1
            ],
            [
                'team_a_id' => 3,
                'team_b_id' => 4,
                'championship_id' => 2,
                'score_team_a' => 0,
                'score_team_b' => 3
            ],
            [
                'team_a_id' => 1,
                'team_b_id' => 3,
                'championship_id' => 1,
                'score_team_a' => 1,
                'score_team_b' => 1
            ]
        ]);
    }
}
