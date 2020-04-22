<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Player;
use App\Season;
use App\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::searchFilter()->orderBy('id', 'ASC')->paginate(30);

        return view('admin.players.index', compact('players'));
    }

    public function create()
    {
        $teams = Team::mainTeamOrRelatedToMainTeam()->get();
        $seasons = Season::all();

        return view('admin.players.createOrEdit', compact('teams', 'seasons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'position' => 'required|in:goalkeeper,defender,midfielder,striker'
        ]);

        $player = new Player();
        $player->name = $request->input('name');
        $player->surname = $request->input('surname');
        $player->position = $request->input('position');
        $player->country = $request->input('country');
        $player->height = $request->input('height');
        $player->birth_date = $request->input('birth_date');
        $player->save();

        $player->syncSeasonsTeams($request);

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $request->file('photo')->move($player->photoPath(), $player->id);
        }

        return redirect()->route('players.edit', $player->id)->with('success', 'Sukurtas naujas žaidėjas.');
    }

    public function edit(Player $player)
    {
        $teams = Team::mainTeamOrRelatedToMainTeam()->get();
        $seasons = Season::all();

        $assignedSeasonsTeams = [];
        foreach ($teams as $team) {
            $playerPlayedForTeamInSeason = $player->seasonsTeams->where('team_id', $team->id);
            foreach ($playerPlayedForTeamInSeason as $playerTeamSeason) {
                $assignedSeasonsTeams[$team->id][] = $playerTeamSeason->season_id;
            }
        }

        return view('admin.players.createOrEdit', compact('player', 'teams', 'seasons', 'assignedSeasonsTeams'));
    }

    public function update(Player $player, Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'position' => 'required|in:goalkeeper,defender,midfielder,striker'
        ]);

        $player->name = $request->input('name');
        $player->surname = $request->input('surname');
        $player->position = $request->input('position');
        $player->country = $request->input('country');
        $player->height = $request->input('height');
        $player->birth_date = $request->input('birth_date');
        $player->save();

        $player->syncSeasonsTeams($request);

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $request->file('photo')->move($player->photoPath(), $player->id);
        }

        return redirect()->back()->with('success', 'Žaidėjas sėkmingai atnaujintas.');
    }
}
