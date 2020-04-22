<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class Player extends Model
{
    // --------------------------------- relationships -----------------------------------------------------------------

    public function seasonsTeams()
    {
        return $this->hasMany('App\SeasonTeamPlayer', 'player_id');
    }

    // --------------------------------- scopes ------------------------------------------------------------------------

    public function scopeMainTeam($q)
    {
        $q->where('id', mainTeamId());
    }

    public function scopeMainTeamOrRelatedToMainTeam($q)
    {
        $q->where('id', mainTeamId())->orWhere('related_team_id', mainTeamId());
    }

    public function scopeSearchFilter($q)
    {
        if (Input::get('name')) {
            $q->where('name', 'LIKE', '%' . Input::get('name') . '%');
        }
        if (Input::get('surname')) {
            $q->where('surname', 'LIKE', '%' . Input::get('surname') . '%');
        }
        if (Input::get('position')) {
            $q->where('position', Input::get('position'));
        }
    }

    // --------------------------------- methods -----------------------------------------------------------------------

    public function photoUrl()
    {
        if ($this->hasLogo()) {
            return url('images/uploads/players/photos/' . $this->id);
        } else {
            return url('images/uploads/players/photos/no_photo.png');
        }
    }

    public function hasLogo()
    {
        return File::exists($this->photoPath() . $this->id);
    }

    public static function photoPath()
    {
        return public_path() . '/images/uploads/players/photos/';
    }

    public function syncSeasonsTeams($request)
    {
        $teams = $request->input('teams');
        $seasonsTeam = $request->input('seasons_teams');

        foreach ($teams as $team_id) {
            $playerPlayedForTeamInSeason = [];
            if (isset($seasonsTeam[$team_id])) {
                foreach ($seasonsTeam[$team_id] as $season_id => $checked) {
                    $playerPlayedForTeamInSeason[] = $season_id;
                }
            }
            if ($playerPlayedForTeamInSeason) {
                SeasonTeamPlayer::where('team_id', $team_id)->where('player_id', $this->id)->whereNotIn('season_id',
                    $playerPlayedForTeamInSeason)->delete();
                foreach ($playerPlayedForTeamInSeason as $season_id) {
                    SeasonTeamPlayer::firstOrCreate([
                        'player_id' => $this->id,
                        'team_id' => $team_id,
                        'season_id' => $season_id
                    ]);
                }
            } else {
                SeasonTeamPlayer::where('player_id', $this->id)->where('team_id', $team_id)->delete();
            }
        }
    }
}
