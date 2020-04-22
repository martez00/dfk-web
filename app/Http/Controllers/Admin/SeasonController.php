<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Season;
use App\SeasonTournament;
use App\Team;
use App\Tournament;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function index()
    {
        $currentSeason = Season::findOrFail(currentSeasonId());
        $seasons = Season::searchFilter()->where('id', '!=', $currentSeason->id)->orderBy('start_date', 'DESC')->paginate(10);

        $tournaments = Tournament::all();
        $mainTeam = Team::mainTeam()->first();
        $teams = $mainTeam->teamWithRelatedTeams();

        $assignedTournamentsToTeams = [];
        foreach($teams as $team) {
            $teamSeasonTournaments = $currentSeason->seasonTournaments->where('team_id', $team->id);
            foreach($teamSeasonTournaments as $teamSeasonTournament) {
                $assignedTournamentsToTeams[$team->id][] = $teamSeasonTournament->tournament_id;
            }
        }

        return view('admin.seasons.index', compact('seasons', 'currentSeason', 'teams', 'tournaments', 'assignedTournamentsToTeams'));
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
        $mainTeam = Team::mainTeam()->first();
        $teams = $mainTeam->teamWithRelatedTeams();

        $assignedTournamentsToTeams = [];
        foreach($teams as $team) {
            $teamSeasonTournaments = $season->seasonTournaments->where('team_id', $team->id);
            foreach($teamSeasonTournaments as $teamSeasonTournament) {
                $assignedTournamentsToTeams[$team->id][] = $teamSeasonTournament->tournament_id;
            }
        }

        return view('admin.seasons.createOrEdit', compact('season', 'teams', 'tournaments', 'assignedTournamentsToTeams'));
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

        $teams = $request->input('teams');
        $seasonTournaments = $request->input('season_tournaments');

        foreach($teams as $teamId) {
            $teamSeasonTournaments = [];
            if(isset($seasonTournaments[$teamId])) {
                foreach($seasonTournaments[$teamId] as $seasonTournamentId => $checked) {
                    $teamSeasonTournaments[] = $seasonTournamentId;
                }
            }
            if($teamSeasonTournaments) {
                SeasonTournament::where('team_id', $teamId)->where('season_id', $season->id)->whereNotIn('tournament_id', $teamSeasonTournaments)->delete();
                foreach($teamSeasonTournaments as $tournamentId) {
                    SeasonTournament::firstOrCreate([
                        'team_id' => $teamId,
                        'tournament_id' => $tournamentId,
                        'season_id' => $season->id
                    ]);
                }
            } else {
                SeasonTournament::where('team_id', $teamId)->where('season_id', $season->id)->delete();
            }
        }

        return redirect()->back()->with('success', 'Sezonas sėkmingai atnaujintas.');
    }
}
