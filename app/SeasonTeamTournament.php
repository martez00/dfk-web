<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeasonTeamTournament extends Model
{
    protected $fillable = ['team_id', 'season_id', 'tournament_id'];
    public $timestamps = false;

    // --------------------------------- relationships -----------------------------------------------------------------

    public function team()
    {
        return $this->belongsTo('App\Team', 'team_id');
    }

    public function season()
    {
        return $this->belongsTo('App\Season', 'season_id');
    }

    public function tournament()
    {
        return $this->belongsTo('App\Tournament', 'tournament_id');
    }
}
