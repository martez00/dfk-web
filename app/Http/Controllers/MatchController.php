<?php

namespace App\Http\Controllers;

use App\Match;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function show ($id, $slug) {
        $match = Match::findOrFail($id);

        $firstHalfEvents = $match->events()->where(function($q) {
            $q->where('minute', '<', '45')->orWhere('minute', 'LIKE', '45%');
        })->orderBy('minute', 'ASC')->get();

        $secondHalfEvents = $match->events()->where(function($q) {
            $q->where('minute', '>', '45')->where('minute', 'NOT LIKE', '45%');
        })->orderBy('minute', 'ASC')->get();

        return view('matches.show', compact('match', 'firstHalfEvents', 'secondHalfEvents'));
    }
}
