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

    public function scopeFinished($q) {
        $q->where('finished', true)->whereNotNull('team_score')->whereNotNull('opponent_team_score');
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

    public function slug() {
        if($this->type == 'home' || $this->type == 'neutral') {
            $homeTeamSlug = str_slug($this->team->name);
            $awayTeamSlug = str_slug($this->opponentTeam->name);
        } else {
            $homeTeamSlug = str_slug($this->opponentTeam->name);
            $awayTeamSlug = str_slug($this->team->name);
        }
        return $homeTeamSlug . '-' . $awayTeamSlug;
    }

    public function homeTeam() {
        if($this->type == 'home' || $this->type == 'neutral') {
            return $this->team;
        } else {
            return $this->opponentTeam;
        }
    }

    public function homeTeamScore() {
        if($this->type == 'home' || $this->type == 'neutral') {
            return $this->team_score;
        } else {
            return $this->opponent_team_score;
        }
    }

    public function awayTeam() {
        if($this->type == 'home' || $this->type == 'neutral') {
            return $this->opponentTeam;
        } else {
            return $this->team;
        }
    }

    public function awayTeamScore() {
        if($this->type == 'home' || $this->type == 'neutral') {
            return $this->opponent_team_score;
        } else {
            return $this->team_score;
        }
    }
}
