<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Tournament extends Model
{
    // --------------------------------- relationships -----------------------------------------------------------------

    public function seasonsTournaments()
    {
        return $this->hasMany('App\SeasonTeamTournament', 'tournament_id');
    }

    // --------------------------------- scopes ------------------------------------------------------------------------

    public function scopeSearchFilter($q)
    {
        if (Input::get('title')) {
            $q->where('title', 'LIKE', '%' . Input::get('title') . '%');
        }
        if (Input::get('level')) {
            $q->where('level', Input::get('level'));
        }
        if (Input::get('cup_tournament')) {
            $q->where('cup_tournament', true);
        }
    }
}
