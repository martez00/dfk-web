<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Season;
use App\SeasonTeamTournament;
use App\Team;
use App\Tournament;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function index()
    {
        $currentSeason = Season::findOrFail(currentSeasonId());
        $seasons = Season::searchFilter()->where('id', '!=', $currentSeason->id)->orderBy('start_date',
            'DESC')->paginate(10);

        $tournaments = Tournament::all();
        $teams = Team::mainTeamOrRelatedToMainTeam()->get();

        $assignedTournamentsToTeams = [];
        foreach ($teams as $team) {
            $teamSeasonsTournaments = $currentSeason->teamsTournaments->where('team_id', $team->id);
            foreach ($teamSeasonsTournaments as $teamSeasonTournament) {
                $assignedTournamentsToTeams[$team->id][] = $teamSeasonTournament->tournament_id;
            }
        }

        return view('admin.seasons.index',
            compact('seasons', 'currentSeason', 'teams', 'tournaments', 'assignedTournamentsToTeams'));
    }

    public function create()
    {
        $tournaments = Tournament::all();
        $teams = Team::mainTeamOrRelatedToMainTeam()->get();

        return view('admin.seasons.createOrEdit', compact('tournaments', 'teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:seasons',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $season = new Season();
        $season->title = $request->input('title');
        $season->start_date = $request->input('start_date');
        $season->end_date = $request->input('end_date');
        $season->save();

        $season->syncTeamsTournaments($request);

        return redirect()->route('seasons.edit', $season->id)->with('success', 'Sukurtas naujas sezonas.');
    }

    public function edit(Season $season)
    {
        $tournaments = Tournament::all();
        $teams = Team::mainTeamOrRelatedToMainTeam()->get();

        $assignedTournamentsToTeams = [];
        foreach ($teams as $team) {
            $teamSeasonTournaments = $season->teamsTournaments->where('team_id', $team->id);
            foreach ($teamSeasonTournaments as $teamSeasonTournament) {
                $assignedTournamentsToTeams[$team->id][] = $teamSeasonTournament->tournament_id;
            }
        }

        return view('admin.seasons.createOrEdit',
            compact('season', 'teams', 'tournaments', 'assignedTournamentsToTeams'));
    }

    public function update(Season $season, Request $request)
    {
        $request->validate([
            'title' => 'required|unique:seasons,title,' . $season->id,
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $season->title = $request->input('title');
        $season->start_date = $request->input('start_date');
        $season->end_date = $request->input('end_date');
        $season->save();

        $season->syncTeamsTournaments($request);

        return redirect()->back()->with('success', 'Sezonas sėkmingai atnaujintas.');
    }
}
