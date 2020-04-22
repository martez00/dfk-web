<?php

namespace App\Http\Controllers\Admin;

use App\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TournamentController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::searchFilter()->orderBy('id', 'ASC')->paginate(10);

        return view('admin.tournaments.index', compact('tournaments'));
    }

    public function create()
    {
        return view('admin.tournaments.createOrEdit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:tournaments',
            'level' => 'min:0|max:5'
        ]);

        $tournament = new Tournament();
        $tournament->title = $request->input('title');
        $tournament->level = $request->input('level');
        $tournament->cup_tournament = (bool)$request->input('cup_tournament');
        $tournament->save();

        return redirect()->route('tournaments.edit', $tournament->id)->with('success', 'Sukurtas naujas turnyras.');
    }

    public function edit(Tournament $tournament)
    {
        return view('admin.tournaments.createOrEdit', compact('tournament'));
    }

    public function update(Tournament $tournament, Request $request)
    {
        $request->validate([
            'title' => 'required|unique:tournaments,title,' . $tournament->id,
            'level' => 'min:0|max:5'
        ]);

        $tournament->title = $request->input('title');
        $tournament->level = $request->input('level');
        $tournament->cup_tournament = (bool)$request->input('cup_tournament');
        $tournament->save();

        return redirect()->back()->with('success', 'Turnyras sėkmingai atnaujintas.');
    }
}
