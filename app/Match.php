<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

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
        return $this->hasMany('App\MatchEvent', 'match_id')->orderBy('minute', 'DESC');
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

    public function scopeSearchFilter($q)
    {
        if (Input::get('team')) {
            $q->where('team_id', Input::get('team'))->orWhere('opponent_team_id', Input::get('team'));
        }
        if (Input::get('type')) {
            $q->where('type', Input::get('type'));
        }
        if (Input::get('season')) {
            $q->where('season_id', Input::get('season'));
        }
        if (Input::get('tournament')) {
            $q->where('tournament_id', Input::get('tournament'));
        }
        if (Input::get('player')) {
            $q->whereHas('players', function($player) {
                $player->where('player_id', Input::get('player'));
            });
        }
        if (Input::get('finished')) {
            $q->where('finished', true);
        }
    }

    // --------------------------------- methods -----------------------------------------------------------------------

    public function matchResultType() {
        if($this->finished) {
            if ($this->team_score > $this->opponent_team_score) {
                return 'won';
            } else if ($this->team_score < $this->opponent_team_score) {
                return 'lost';
            } elseif ($this->team_score == $this->opponent_team_score) {
                return 'draw';
            }
        } else {
            return 'not_finished';
        }
    }
}
