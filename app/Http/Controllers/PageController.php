<?php

namespace App\Http\Controllers;

use App\Match;
use App\Team;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homepage()
    {
        $fixtures = Match::with(['team', 'opponentTeam', 'season', 'tournament'])->notStarted()->mainTeamMatches()->orderBy('date', 'ASC')->take(3)->get();
        $needToTakeResults = 5 + (3 - count($fixtures));
        $results = Match::with(['team', 'opponentTeam', 'season', 'tournament'])->finished()->mainTeamMatches()->orderBy('date', 'DESC')->take($needToTakeResults)->get();

        foreach($fixtures as $fixture) {
            $fixture->is_fixture = true;
            $matches[] = $fixture;
        }

        foreach($results as $result) {
            $result->is_fixture = false;
            $matches[] = $result;
        }

        return view('pages.homepage.index', compact('matches'));
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
