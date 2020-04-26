<?php

namespace App\Http\Controllers\Admin;

use App\Match;
use App\MatchEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MatchEventController extends Controller
{
    public function store($match_id, Request $request) {
        $request->validate([
            'player_id' => 'required|exists:players,id',
            'team_id' => 'required'
        ]);

        $match = Match::where('id', $match_id)->first();
        if(!$match) {
            return redirect()->route('matches.index')->with('error', 'Nerastos rungtynės kurioms norite pridėti žaidėją.');
        }

        $matchEvent = new MatchEvent();
        $matchEvent->match_id = $match_id;
        $matchEvent->team_id = $request->input('team_id');
        $matchEvent->player_id = $request->input('player_id');
        $matchEvent->minute = $request->input('minute');
        $matchEvent->save();

        return redirect()->back()->with('success', 'Įvykis sėkmingai pridėtas.');
    }

    /**
     * Delete the model from the database.
     *
     * @return bool|null
     *
     * @throws \Exception
     */

    public function destroy($match_id, MatchEvent $matchEvent) {
        $matchEvent->delete();
        return redirect()->back()->with('success', 'Įvykis sėkmingai ištrintas.');
    }
}
