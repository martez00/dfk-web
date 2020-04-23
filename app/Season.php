<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Season extends Model
{
    // --------------------------------- relationships -----------------------------------------------------------------

    public function teamsTournaments()
    {
        return $this->hasMany('App\SeasonTeamTournament', 'season_id');
    }

    public function teamsPlayers()
    {
        return $this->hasMany('App\SeasonTeamPlayer', 'season_id');
    }

    public function matches()
    {
        return $this->hasMany('App\Match', 'season_id');
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

    public function syncTeamsTournaments($request)
    {
        $teams = $request->input('teams');
        $seasonTournaments = $request->input('season_tournaments');

        foreach ($teams as $teamId) {
            $teamSeasonTournaments = [];
            if (isset($seasonTournaments[$teamId])) {
                foreach ($seasonTournaments[$teamId] as $seasonTournamentId => $checked) {
                    $teamSeasonTournaments[] = $seasonTournamentId;
                }
            }
            if ($teamSeasonTournaments) {
                SeasonTeamTournament::where('team_id', $teamId)->where('season_id',
                    $this->id)->whereNotIn('tournament_id', $teamSeasonTournaments)->delete();
                foreach ($teamSeasonTournaments as $tournamentId) {
                    SeasonTeamTournament::firstOrCreate([
                        'team_id' => $teamId,
                        'tournament_id' => $tournamentId,
                        'season_id' => $this->id
                    ]);
                }
            } else {
                SeasonTeamTournament::where('team_id', $teamId)->where('season_id', $this->id)->delete();
            }
        }
    }
}
