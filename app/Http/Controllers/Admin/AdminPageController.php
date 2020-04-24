<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Match;
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

    public function test()
    {
        $firstTeam = Team::where('id', 1)->first();
        $secondTeam = Team::where('id', 2)->first();

        $parserArr = [
            '0' => ['team' => $firstTeam, 'slug' => 'dainava-1458', 'name' => 'Dainava'],
            '1' => ['team' => $firstTeam, 'slug' => 'dfk-dainava-8156', 'name' => 'DFK Dainava'],
            '2' => ['team' => $secondTeam, 'slug' => 'dainava-2-1445', 'name' => 'Dainava-2'],
            '3' => ['team' => $secondTeam, 'slug' => 'dfk-dainava-b-13810', 'name' => 'DFK Dainava B'],
        ];

        foreach($parserArr as $parserItems) {
            unset($matches);
            unset($parser);
            $parser = new LietuvosFutbolasParser();
            $parser->parse($parserItems['slug'], $parserItems['name'], $parserItems['team']);
            $matches = $parser->matchesArr;
            if($matches) {
                $this->proceedParsedMatches($matches, $parserItems['team']);
            }
        }
    }

    private function proceedParsedMatches($matches, $team) {
        foreach ($matches as $parsedMatch) {
            $opponentTeam = Team::where('name', 'FK „' . $parsedMatch['opponentTeam'] . '“')->first();
            if ( ! $opponentTeam) {
                $opponentTeam = new Team();
                $opponentTeam->name = 'FK „' . $parsedMatch['opponentTeam'] . '“';
                $opponentTeam->short_name = Str::limit(Str::upper(str_replace(' ', '', $parsedMatch['opponentTeam'])), 3, '');
                $opponentTeam->city = 'Lietuva';
                $opponentTeam->country = '-';
                $opponentTeam->save();
            }

            $season = $parsedMatch['season'];
            $tournament = $parsedMatch['tournament'];

            $seasonTeamTournament = SeasonTeamTournament::where('team_id', $team->id)->where('season_id', $season->id)->where('tournament_id', $tournament);
            if(!$seasonTeamTournament) {
                $seasonTeamTournament = new SeasonTeamTournament();
                $seasonTeamTournament->team_id = $team->id;
                $seasonTeamTournament->season_id = $season->id;
                $seasonTeamTournament->tournament = $tournament->id;
                $seasonTeamTournament->save();
            }

            $match = new Match();
            $match->team_id = $team->id;
            $match->opponent_team_id = $opponentTeam->id;
            $match->season_id = $season->id;
            $match->tournament_id = $tournament->id;
            $match->type = $parsedMatch['type'];
            $match->team_score = $parsedMatch['mainTeamScore'];
            $match->opponent_team_score = $parsedMatch['opponentTeamScore'];
            $match->finished = true;
            $match->date = $parsedMatch['date']['date'];
            $match->time = $parsedMatch['date']['time'];
            $match->location = '-';
            $match->save();
        }
    }
}
