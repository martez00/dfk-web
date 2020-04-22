<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    // --------------------------------- relationships -----------------------------------------------------------------

    public function team()
    {
        return $this->belongsTo('App\Team', 'team_id');
    }
}
