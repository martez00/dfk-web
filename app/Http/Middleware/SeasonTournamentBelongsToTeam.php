<?php

namespace App\Http\Middleware;

use App\SeasonTeamTournament;
use App\Team;
use Closure;

class SeasonTournamentBelongsToTeam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $team_id = $request->team_id;
        $season_id = $request->season_id;
        $tournament_id = $request->tournament_id;
        $mainTeam_id = mainTeamId();

        $team = Team::where('id', $team_id)->first();

        if(!$team || ($team->id != $mainTeam_id && $team->related_team_id != $mainTeam_id)) {
            return redirect()->route('matches.index')->with('error', 'Galite sukurti rungtynes tik parinktai pagrindinei sistemos ir su ja susijusioms komandoms.');
        }

        $seasonTeamTournament = SeasonTeamTournament::where('team_id', $team_id)->where('season_id', $season_id)->where('tournament_id', $tournament_id)->first();

        if(!$seasonTeamTournament) {
            return redirect()->route('matches.index')->with('error', 'Jūsų pasirinktai komandai nėra priskirtas toks turnyras pasirinktam sezonui.');
        }

        return $next($request);
    }
}
