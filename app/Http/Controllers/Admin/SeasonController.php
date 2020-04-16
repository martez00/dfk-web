<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Season;
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
        return view('admin.seasons.createOrEdit');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:seasons',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $season = new Season();
        $season->title = $validatedData['title'];
        $season->start_date = $validatedData['start_date'];
        $season->end_date = $validatedData['end_date'];
        $season->save();

        return redirect()->route('seasons.edit', $season->id)->with('success', 'Sukurtas naujas sezonas.');
    }

    public function edit(Season $season)
    {
        return view('admin.seasons.createOrEdit', compact('season'));
    }

    public function update(Season $season, Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:seasons,title,' . $season->id,
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $season->title = $validatedData['title'];
        $season->start_date = $validatedData['start_date'];
        $season->end_date = $validatedData['end_date'];
        $season->save();

        return redirect()->back()->with('success', 'Sezonas sėkmingai atnaujintas.');
    }
}