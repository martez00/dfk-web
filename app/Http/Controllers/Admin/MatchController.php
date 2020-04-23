<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Match;
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

        $matches = Match::mainTeamMatches()->paginate(30);

        return view('admin.matches.index', compact('matches', 'teams', 'seasons', 'tournaments'));
    }

    public function create($team_id, $season_id, $tournament_id) {
        $team = Team::where('id', $team_id)->first();

        if(!$team || ($team->id != mainTeamId() && $team->related_team_id != mainTeamId())) {
            return redirect()->route('matches.index')->with('error', 'Galite sukurti rungtynes tik parinktai pagrindinei sistemos ir su ja susijusioms komandoms.');
        }

        $seasonTeamTournament = SeasonTeamTournament::where('team_id', $team_id)->where('season_id', $season_id)->where('tournament_id', $tournament_id)->first();

        if(!$seasonTeamTournament) {
            return redirect()->route('matches.index')->with('error', 'Jūsų pasirinktai komandai nėra priskirtas toks turnyras pasirinktam sezonui.');
        }

        $tournament = $seasonTeamTournament->tournament;
        $season = $seasonTeamTournament->season;
        $teams = Team::where('id', '!=', $team_id)->get();

        return view('admin.matches.create', compact('team', 'teams', 'season', 'tournament'));
    }

    public function store(Request $request) {
        $request->validate([
            'team_id' => 'required|exists:teams,id',
            'season_id' => 'required|exists:seasons,id',
            'tournament_id' => 'required|exists:tournaments,id',
            'opponent_team_id' => 'required|exists:teams,id|different:team_id',
            'type' => 'required|in:home,away,neutral',
            'team_score' => 'min:0',
            'opponent_team_score' => 'min:0',
            'attendance' => 'min:0'
        ]);

        $match = new Match();
        $match->team_id = $request->input('team_id');
        $match->opponent_team_id = $request->input('opponent_team_id');
        $match->season_id = $request->input('season_id');
        $match->tournament_id = $request->input('tournament_id');
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
        return view('admin.matches.edit', compact('match', 'teams'));
    }

    public function update(Match $match, Request $request) {
        $request->validate([
            'opponent_team_id' => 'required|exists:teams,id',
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
