<?php

namespace App\Http\Controllers\Admin;

use App\Season;
use App\Setting;
use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function edit()
    {
        $mainTeamSetting = Setting::where('name', 'main_team')->first();
        $currentSeasonSetting = Setting::where('name', 'current_season')->first();
        $teams = Team::all();
        $seasons = Season::orderBy('start_date', 'DESC')->get();
        return view('admin.settings.edit', compact('mainTeamSetting', 'currentSeasonSetting', 'teams', 'seasons'));
    }

    public function update(Request $request)
    {
       $request->validate([
            'main_team' => 'required',
            'current_season' => 'required'
        ]);

        $allSettings = Setting::all();
        foreach($allSettings as $setting) {
            $setting->value = $request->input($setting->name);
            $setting->save();
        }

        return redirect()->back()->with('success', 'Nustatymai sėkmingai atnaujinti.');
    }
}
