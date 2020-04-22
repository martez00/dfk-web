<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Season extends Model
{
    // --------------------------------- relationships -----------------------------------------------------------------

    public function seasonTournaments()
    {
        return $this->hasMany('App\SeasonTournament', 'season_id');
    }

    // --------------------------------- scopes ------------------------------------------------------------------------

    public function scopeSearchFilter($q)
    {
        if (Input::get('title')) {
            $q->where('title', 'LIKE', '%' . Input::get('title') . '%');
        }
        if (Input::get('start_date')) {
            $q->where('start_date', Input::get('start_date'));
        }
        if (Input::get('end_date')) {
            $q->where('end_date', Input::get('end_date'));
        }
    }
}
