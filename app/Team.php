<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class Team extends Model
{

    // --------------------------------- relationships -----------------------------------------------------------------
    // when team belongs to any other team
    public function belongsToTeam()
    {
        return $this->belongsTo('App\Team', 'related_team_id');
    }

    //when team has related teams
    public function relatedTeams()
    {
        return $this->hasMany('App\Team', 'related_team_id');
    }

    public function seasonsTournaments()
    {
        return $this->hasMany('App\SeasonTeamTournament', 'team_id');
    }

    public function seasonsPlayers()
    {
        return $this->hasMany('App\SeasonTeamPlayer', 'team_id');
    }

    // --------------------------------- scopes ------------------------------------------------------------------------

    public function scopeMainTeam($q) {
        $q->where('id', mainTeamId());
    }

    public function scopeMainTeamOrRelatedToMainTeam($q) {
        $q->where('id', mainTeamId())->orWhere('related_team_id', mainTeamId());
    }

    public function scopeSearchFilter($q)
    {
        if (Input::get('name')) {
            $q->where('name', 'LIKE', '%' . Input::get('name') . '%');
        }
        if (Input::get('short_name')) {
            $q->where('short_name', Input::get('short_name'));
        }
        if (Input::get('country')) {
            $q->where('country', Input::get('country'));
        }
        if (Input::get('city')) {
            $q->where('city', Input::get('city'));
        }
        if (Input::get('has_related_teams')) {
            $q->whereHas('relatedTeams');
        }
        if (Input::get('is_related_to_other_team')) {
            $q->whereNotNull('related_team_id');
        }
        if (Input::get('main_team')) {
            $q->mainTeamOrRelatedToMainTeam();
        }
    }

    // --------------------------------- methods -----------------------------------------------------------------------

    public static function logoPath()
    {
        return public_path() . '/images/uploads/teams/logos/';
    }

    public function hasLogo()
    {
        return File::exists($this->logoPath() . $this->id);
    }

    public function logoUrl()
    {
        if($this->hasLogo()) {
            return url('images/uploads/teams/logos/' . $this->id);
        } else {
            if($this->belongsToTeam && $this->belongsToTeam->hasLogo()) {
                return url('images/uploads/teams/logos/' . $this->belongsToTeam->id);
            }
            return url('images/uploads/teams/logos/no_logo.png');
        }
    }

    public function teamWithRelatedTeams() {
        $teamsArr[] = $this;
        foreach($this->relatedTeams as $relatedTeam) {
            $teamsArr[] = $relatedTeam;
        }
        return $teamsArr;
    }
}
