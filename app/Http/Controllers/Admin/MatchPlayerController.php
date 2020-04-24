<?php

namespace App\Http\Controllers\Admin;

use App\Match;
use App\MatchPlayer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MatchPlayerController extends Controller
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

        $matchPlayer = MatchPlayer::where('match_id', $match_id)->where('team_id', $request->input('team_id'))->where('player_id', $request->input('player_id'))->first();
        if($matchPlayer) {
            return redirect()->back()->with('error', 'Pasirinktas žaidėjas šioms rungtynėms jau priskirtas.');
        }

        $matchPlayer = new MatchPlayer();
        $matchPlayer->match_id = $match_id;
        $matchPlayer->team_id = $request->input('team_id');
        $matchPlayer->player_id = $request->input('player_id');
        $matchPlayer->starting_lineup = (bool) $request->input('starting_lineup');
        $matchPlayer->save();

        return redirect()->back()->with('success', 'Žaidėjas sėkmingai pridėtas.');
    }

    /**
     * Delete the model from the database.
     *
     * @return bool|null
     *
     * @throws \Exception
     */

    public function destroy($match_id, MatchPlayer $matchPlayer) {
        $matchPlayer->delete();
        return redirect()->back()->with('success', 'Žaidėjas sėkmingai ištrintas.');
    }
}
