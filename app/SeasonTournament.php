<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeasonTournament extends Model
{
    protected $fillable = ['team_id', 'season_id', 'tournament_id'];

    // --------------------------------- relationships -----------------------------------------------------------------

    public function belongsToTeam()
    {
        return $this->belongsTo('App\Team', 'team_id');
    }

    public function belongsToSeason()
    {
        return $this->belongsTo('App\Season', 'season_id');
    }

    public function belongsToTournament()
    {
        return $this->belongsTo('App\Tournament', 'tournament_id');
    }
}
