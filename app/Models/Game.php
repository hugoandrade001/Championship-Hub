<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['team_a_id', 'team_b_id', 'championship_id', 'score_team_a', 'score_team_b'];

    public function teamA()
    {
        return $this->belongsTo(Team::class, 'team_a_id');
    }

    public function teamB()
    {
        return $this->belongsTo(Team::class, 'team_b_id');
    }

    public function championship()
    {
        return $this->belongsTo(Championship::class, 'championship_id');
    }
}