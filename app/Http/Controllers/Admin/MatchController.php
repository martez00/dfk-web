<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Match;
use App\Team;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index() {

        $teams = Team::mainTeamOrRelatedToMainTeam()->get();
        $matches = Match::mainTeamMatches()->paginate(30);

        return view('admin.matches.index', compact('matches', 'teams'));
    }
}
