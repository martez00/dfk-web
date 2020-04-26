<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Match;
use App\MatchEvent;
use App\MatchPlayer;
use App\Player;
use App\SeasonTeamPlayer;
use App\SeasonTeamTournament;
use App\Team;
use App\Tools\LietuvosFutbolasParser;
use Illuminate\Support\Str;

class AdminPageController extends Controller
{
    public function index()
    {
        return view('admin.pages.index');
    }
}
