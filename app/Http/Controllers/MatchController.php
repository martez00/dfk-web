<?php

namespace App\Http\Controllers;

use App\Match;
use App\Team;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function show ($id) {
        $match = Match::with(['team', 'opponentTeam', 'season', 'tournament'])->findOrFail($id);

        $otherTeamsMatches = Match::where(function($q) use($match) {
            $q->where('team_id', $match->team_id)->orWhere('opponent_team_id', $match->team_id);
        })->where(function($q) use($match) {
            $q->where('opponent_team_id', $match->opponent_team_id)->orWhere('opponent_team_id', $match->opponent_team_id);
        })->whereNotIn('id', [$match->id])->orderBy('date', 'DESC')->finished()->take(5)->get();

        $homeTeamEvents = $match->events()->where('team_id', $match->homeTeam()->id)->orderBy('minute', 'ASC')->get();
        $awayTeamEvents = $match->events()->where('team_id', $match->awayTeam()->id)->orderBy('minute', 'ASC')->get();

        $homeTeamStartingPlayers = $match->players()->where('team_id', $match->homeTeam()->id)->startingLineupPlayers()->get();
        $awayTeamStartingPlayers = $match->players()->where('team_id', $match->awayTeam()->id)->startingLineupPlayers()->get();

        $homeTeamBenchPlayers = $match->players()->where('team_id', $match->homeTeam()->id)->benchPlayers()->get();
        $awayTeamBenchPlayers = $match->players()->where('team_id', $match->awayTeam()->id)->benchPlayers()->get();

        return view('matches.show', compact('match' ,'homeTeamEvents', 'awayTeamEvents', 'homeTeamStartingPlayers', 'homeTeamBenchPlayers', 'awayTeamStartingPlayers', 'awayTeamBenchPlayers', 'otherTeamsMatches'));
    }

    public function teamsMutualMatches($first_team_id, $second_team_id) {
        $firstTeam = Team::findOrFail($first_team_id);
        $secondTeam = Team::findOrFail($second_team_id);

        $matches = Match::where(function($q) use($first_team_id) {
            $q->where('team_id', $first_team_id)->orWhere('opponent_team_id', $first_team_id);
        })->where(function($q) use($second_team_id) {
            $q->where('opponent_team_id', $second_team_id)->orWhere('opponent_team_id', $second_team_id);
        })->orderBy('date', 'DESC')->paginate(10);

        return view('matches.teams_mutual_matches', compact('matches', 'firstTeam', 'secondTeam'));
    }
}
