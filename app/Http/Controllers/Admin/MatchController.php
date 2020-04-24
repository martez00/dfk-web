<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Match;
use App\MatchPlayer;
use App\Player;
use App\Season;
use App\SeasonTeamTournament;
use App\Team;
use App\Tournament;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index() {

        $teams = Team::mainTeamOrRelatedToMainTeam()->get();
        $seasons = Season::orderBy('start_date', 'DESC')->get();
        $tournaments = Tournament::all();

        $matches = Match::mainTeamMatches()->orderBy('date', 'DESC')->paginate(30);

        return view('admin.matches.index', compact('matches', 'teams', 'seasons', 'tournaments'));
    }

    public function create($team_id, $season_id, $tournament_id) {
        $team = Team::where('id', $team_id)->first();
        $tournament = Tournament::where('id', $tournament_id)->first();
        $season = Season::where('id', $season_id)->first();
        $teams = Team::where('id', '!=', $team_id)->get();

        return view('admin.matches.create', compact('team', 'teams', 'season', 'tournament'));
    }

    public function store($team_id, $season_id, $tournament_id, Request $request) {
        $request->validate([
            'opponent_team_id' => 'required|exists:teams,id|not_in:'.$team_id,
            'type' => 'required|in:home,away,neutral',
            'team_score' => 'min:0',
            'opponent_team_score' => 'min:0',
            'attendance' => 'min:0'
        ]);

        $match = new Match();
        $match->team_id = $team_id;
        $match->opponent_team_id = $request->input('opponent_team_id');
        $match->season_id = $season_id;
        $match->tournament_id = $tournament_id;
        $match->type = $request->input('type');
        $match->team_score = $request->input('team_score');
        $match->opponent_team_score = $request->input('opponent_team_score');
        $match->attendance = $request->input('attendance');
        $match->location = $request->input('location');
        $match->date = $request->input('date');
        $match->time = $request->input('time');
        $match->finished = (bool) $request->input('finished');
        $match->save();

        return redirect()->route('matches.edit', $match->id)->with('success', 'Rungtynės sėkmingai sukurtos. Galite suvesti protokolą ir kitą informaciją kai jos bus pasibaigę.');
    }

    public function edit(Match $match) {
        $teams = Team::where('id', '!=', $match->team_id)->get();

        $allPlayersForMainTeam = Player::seasonTeamFilter($match->team_id, $match->season_id)->get();
        $allPlayersForOpponentTeam = Player::whereNotIn('id', $allPlayersForMainTeam->pluck('id'))->get();

        $assignedPlayersForMainTeam = $match->players()->where('team_id', $match->team_id)->get();
        $assignedPlayersForOpponentTeam = $match->players()->where('team_id', $match->opponent_team_id)->get();

        return view('admin.matches.edit', compact('match', 'teams', 'allPlayersForMainTeam', 'allPlayersForOpponentTeam', 'assignedPlayersForMainTeam', 'assignedPlayersForOpponentTeam'));
    }

    public function update(Match $match, Request $request) {
        $request->validate([
            'opponent_team_id' => 'required|exists:teams,id|not_in:'.$match->team_id,
            'type' => 'required|in:home,away,neutral',
            'team_score' => 'min:0',
            'opponent_team_score' => 'min:0',
            'attendance' => 'min:0'
        ]);

        $match->opponent_team_id = $request->input('opponent_team_id');
        $match->type = $request->input('type');
        $match->team_score = $request->input('team_score');
        $match->opponent_team_score = $request->input('opponent_team_score');
        $match->attendance = $request->input('attendance');
        $match->location = $request->input('location');
        $match->date = $request->input('date');
        $match->time = $request->input('time');
        $match->finished = (bool) $request->input('finished');
        $match->save();

        return redirect()->back()->with('success', 'Rungtynės sėkmingai atnaujintos.');
    }
}
