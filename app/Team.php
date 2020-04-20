<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Team extends Model
{

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
