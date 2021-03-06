<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchPlayer extends Model
{
    // --------------------------------- relationships -----------------------------------------------------------------

    public function match()
    {
        return $this->belongsTo('App\Match', 'match_id');
    }

    public function team()
    {
        return $this->belongsTo('App\Team', 'team_id');
    }

    public function player()
    {
        return $this->belongsTo('App\Player', 'player_id');
    }

    // --------------------------------- scopes ------------------------------------------------------------------------

    public function scopeStartingLineupPlayers($q) {
        $q->where('starting_lineup', true);
    }

    public function scopeBenchPlayers($q) {
        $q->where('starting_lineup', false);
    }
}
