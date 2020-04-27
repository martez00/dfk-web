<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::searchFilter()->orderBy('id', 'ASC')->paginate(20);

        return view('admin.teams.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.teams.createOrEdit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:teams'
        ]);

        $team = new Team();
        $team->name = $request->input('name');
        $team->short_name = $request->input('short_name');
        $team->country = $request->input('country');
        $team->city = $request->input('city');
        $team->phone_number = $request->input('phone_number');
        $team->email = $request->input('email');
        $team->address = $request->input('address');
        $team->website = $request->input('website');
        $team->save();

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $request->file('logo')->move($team->logoPath(), $team->id);
        }

        return redirect()->route('teams.edit', $team->id)->with('success', 'Sukurta nauja komanda.');
    }

    public function edit(Team $team)
    {
        $teams = Team::where('id', '!=', $team->id)->get();
        return view('admin.teams.createOrEdit', compact('team', 'teams'));
    }

    public function update(Team $team, Request $request)
    {
        $request->validate([
            'name' => 'required|unique:teams,name,' . $team->id,
            'related_team_id' => 'nullable|exists:teams,id'
        ]);

        $team->name = $request->input('name');
        $team->short_name = $request->input('short_name');
        $team->country = $request->input('country');
        $team->city = $request->input('city');
        $team->phone_number = $request->input('phone_number');
        $team->email = $request->input('email');
        $team->address = $request->input('address');
        $team->website = $request->input('website');
        $team->related_team_id = $request->input('related_team_id');
        $team->save();

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $request->file('logo')->move($team->logoPath(), $team->id);
        }

        return redirect()->back()->with('success', 'Komanda sėkmingai atnaujinta.');
    }
}
