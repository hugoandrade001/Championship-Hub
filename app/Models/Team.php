<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function gamesAsTeamA()
    {
        return $this->hasMany(Game::class, 'team_a_id');
    }

    public function gamesAsTeamB()
    {
        return $this->hasMany(Game::class, 'team_b_id');
    }
}