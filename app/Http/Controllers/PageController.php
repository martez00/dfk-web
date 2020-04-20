<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homepage()
    {
        return view('pages.homepage');
    }

    public function contacts()
    {
        $team = Team::find(mainTeamId());
        return view('pages.contacts', compact('team'));
    }

    public function administration()
    {
        return view('pages.administration');
    }

    public function stadiums()
    {
        return view('pages.stadiums');
    }

    public function history()
    {
        return view('pages.history');
    }

    public function attributes()
    {
        return view('pages.attributes');
    }

    public function support()
    {
        return view('pages.support');
    }

    public function fans()
    {
        return view('pages.fans');
    }

    public function tickets()
    {
        return view('pages.tickets');
    }
}
