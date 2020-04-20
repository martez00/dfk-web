<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    // --------------------------------- relationships -----------------------------------------------------------------

    public function tournaments() {
        return $this->belongsToMany('App\Tournament', 'season_tournaments');
    }
}
