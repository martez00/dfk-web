<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Season;
use App\Team;
use App\Tournament;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function index()
    {
        $seasons = Season::orderBy('start_date', 'DESC')->paginate(10);

        return view('admin.seasons.index', compact('seasons'));
    }

    public function create()
    {
        $tournaments = Tournament::all();
        return view('admin.seasons.createOrEdit', compact('tournaments'));
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

        $seasonTournamentsIdsArr = [];
        if($request->has('season_tournaments')) {
            $seasonTournaments = $request->get('season_tournaments');
            foreach($seasonTournaments as $seasonTournament => $checked) {
                $seasonTournamentsIdsArr[$seasonTournament] = ['team_id' => mainTeamId()];
            }
        }

        $season->tournaments()->sync($seasonTournamentsIdsArr);

        return redirect()->route('seasons.edit', $season->id)->with('success', 'Sukurtas naujas sezonas.');
    }

    public function edit(Season $season)
    {
        $tournaments = Tournament::all();
        $teams = Team::where('id', mainTeamId())->first()->teamWithRelatedTeams();

        $assignedTourmanets = [];
        foreach($season->tournaments as $tournament) {
            $assignedTourmanets[] = $tournament->id;
        }
        return view('admin.seasons.createOrEdit', compact('season', 'tournaments', 'assignedTourmanets'));
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

        $seasonTournamentsIdsArr = [];
        if($request->has('season_tournaments')) {
            $seasonTournaments = $request->get('season_tournaments');
            foreach($seasonTournaments as $seasonTournament => $checked) {
                $seasonTournamentsIdsArr[$seasonTournament] = ['team_id' => mainTeamId()];
            }
        }

        $season->tournaments()->sync($seasonTournamentsIdsArr);

        return redirect()->back()->with('success', 'Sezonas sėkmingai atnaujintas.');
    }
}
