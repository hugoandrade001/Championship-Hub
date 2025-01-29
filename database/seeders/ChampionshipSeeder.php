<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Championship;

class ChampionshipSeeder extends Seeder
{
    public function run(): void
    {
        Championship::insert([
            ['name' => 'Championship 1'],
            ['name' => 'Championship 2'],
            ['name' => 'Championship 3'],
        ]);
    }
}
