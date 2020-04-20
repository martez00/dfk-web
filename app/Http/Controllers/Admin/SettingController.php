<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function edit()
    {
        $mainTeamSetting = Setting::where('name', 'main_team')->first();
        $teams = Team::all();
        return view('admin.settings.edit', compact('mainTeamSetting', 'teams'));
    }

    public function update(Request $request)
    {
       $request->validate([
            'main_team' => 'required'
        ]);

        $mainTeamSetting = Setting::where('name', 'main_team')->first();
        $mainTeamSetting->value = $request->input('main_team');
        $mainTeamSetting->save();
        return redirect()->back()->with('success', 'Nustatymai sėkmingai atnaujinti.');
    }
}
