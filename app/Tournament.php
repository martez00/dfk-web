<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    // --------------------------------- relationships -----------------------------------------------------------------

    public function seasons() {
        return $this->belongsToMany('App\Season', 'season_tournaments')->where('team_id', mainTeamId());
    }
}
