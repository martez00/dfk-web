<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    // --------------------------------- relationships -----------------------------------------------------------------

    public function team()
    {
        return $this->belongsTo('App\Team', 'team_id');
    }

    public function opponentTeam()
    {
        return $this->belongsTo('App\Team', 'opponent_team_id');
    }

    public function season()
    {
        return $this->belongsTo('App\Season', 'season_id');
    }

    public function tournament()
    {
        return $this->belongsTo('App\Tournament', 'tournament_id');
    }

    public function events()
    {
        return $this->hasMany('App\MatchEvent', 'match_id');
    }

    public function players()
    {
        return $this->hasMany('App\MatchPlayer', 'match_id')->orderBy('starting_lineup', 'DESC');
    }

    // --------------------------------- scopes ------------------------------------------------------------------------

    public function scopeMainTeamMatches($q)
    {
        $q->whereHas('team', function($team) {
            $team->where('id', mainTeamId())->orWhere('related_team_id', mainTeamId());
        });
    }
}
