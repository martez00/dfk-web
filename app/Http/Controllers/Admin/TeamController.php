<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::orderBy('id', 'DESC')->paginate(10);

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
        $team->save();

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $request->file('logo')->move($team->logoPath(), $team->id);
        }

        return redirect()->route('teams.edit', $team->id)->with('success', 'Sukurta nauja komanda.');
    }

    public function edit(Team $team)
    {
        return view('admin.teams.createOrEdit', compact('team'));
    }

    public function update(Team $team, Request $request)
    {
        $request->validate([
            'name' => 'required|unique:teams,name,' . $team->id
        ]);

        $team->name = $request->input('name');
        $team->short_name = $request->input('short_name');
        $team->country = $request->input('country');
        $team->city = $request->input('city');
        $team->phone_number = $request->input('phone_number');
        $team->email = $request->input('email');
        $team->address = $request->input('address');
        $team->save();

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $request->file('logo')->move($team->logoPath(), $team->id);
        }

        return redirect()->back()->with('success', 'Komanda sėkmingai atnaujinta.');
    }
}
