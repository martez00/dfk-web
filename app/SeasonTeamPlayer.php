<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeasonTeamPlayer extends Model
{
    protected $fillable = ['player_id', 'season_id', 'team_id'];
    public $timestamps = false;

    // --------------------------------- relationships -----------------------------------------------------------------

    public function player()
    {
        return $this->belongsTo('App\Player', 'player_id');
    }

    public function season()
    {
        return $this->belongsTo('App\Season', 'season_id');
    }

    public function team()
    {
        return $this->belongsTo('App\Team', 'team_id');
    }
}
