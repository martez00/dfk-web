<?php

namespace App\Tools;

use App\Match;
use App\MatchEvent;
use App\MatchPlayer;
use App\Player;
use App\Season;
use App\SeasonTeamPlayer;
use App\SeasonTeamTournament;
use App\Team;
use App\Tournament;
use Illuminate\Support\Str;
use XPathSelector\Exception\NodeNotFoundException;
use XPathSelector\Selector;

class LietuvosFutbolasParser
{
    public $matchesArr = null;
    private $parsedPlayers = [];
    private $url = 'http://lietuvosfutbolas.lt';
    private $team_slug = null;
    private $teamNameInParsingWebsite = null;
    private $team = null;
    private $competition_id = '';
    private $mainTab = 'tabContent_1_1';

    public function parseMatches($team_slug, $teamNameInParsingWebsite, $team, $competition_id = '')
    {
        $this->team_slug = $team_slug;
        $this->teamNameInParsingWebsite = $teamNameInParsingWebsite;
        $this->team = $team;
        $this->competition_id = $competition_id;

        $currentPageUrl = $this->lastMatchesPage();
        if ($currentPageUrl) {
            while ($currentPageUrl >= 1) {
                $resultsPageUrl = $this->url . '/en/clubs/' . $this->team_slug . '/?tab=fixtures&pg=' . $currentPageUrl . ($this->competition_id ? '&cid=' . $this->competition_id : '');

                $resultsPage = Selector::loadHTMLFile($resultsPageUrl);

                $matchesCount = count($resultsPage->findAll('//*[@id="' . $this->mainTab . '"]/div/table/tr'));
                while ($matchesCount > 1) {
                    $matchRow = $resultsPage->find('//*[@id="' . $this->mainTab . '"]/div/table/tr[' . $matchesCount . ']');
                    $dateTime = $this->getMatchDateTimeArrByRow($matchRow);
                    $team1 = $this->replaceTeamSymbols($matchRow->find('td[3]/a/text()')->extract());
                    $team2 = $this->replaceTeamSymbols($matchRow->find('td[4]/a/text()')->extract());
                    $matchType = $team1 == $this->teamNameInParsingWebsite ? 'home' : 'away';

                    $team1Score = $matchRow->find('td[5]/div/a/span[1]/text()')->extract();
                    $team2Score = $matchRow->find('td[5]/div/a/span[3]/text()')->extract();

                    $tournament = $this->getTournament($matchRow->find('td[2]')->extract());

                    $season = Season::where('start_date', '<=', $dateTime['date'])->where('end_date', '>=',
                        $dateTime['date'])->first();
                    if (!$season) {
                        $year = date("Y", strtotime($dateTime['date']));
                        $season = new Season();
                        $season->title = $year . ' metų sezonas';
                        $season->start_date = $year . '-01-01';
                        $season->end_date = $year . '-12-31';
                        $season->save();
                    }

                    $matchUrl = $matchRow->find('td[5]/div/a/@href')->extract();
                    $matchItems = $this->parseMatchItems($matchUrl, $matchType);

                    $matchArr = [
                        'mainTeamModel' => $this->team,
                        'mainTeam' => $team1 == $this->teamNameInParsingWebsite ? $team1 : $team2,
                        'mainTeamScore' => $team1 == $this->teamNameInParsingWebsite ? $team1Score : $team2Score,
                        'opponentTeam' => $team1 == $this->teamNameInParsingWebsite ? $team2 : $team1,
                        'opponentTeamScore' => $team1 == $this->teamNameInParsingWebsite ? $team2Score : $team1Score,
                        'season' => $season,
                        'tournament' => $tournament,
                        'type' => $matchType,
                        'date' => $dateTime,
                        'items' => $matchItems
                    ];

                    $this->matchesArr[] = $matchArr;

                    $matchesCount--;
                }
                $currentPageUrl--;
            }
            $this->proceedParsedMatches();
        }
    }

    public function parseMatchItems($matchUrl, $matchType)
    {
        $matchFullUrl = $this->url . $matchUrl;
        $matchPage = Selector::loadHTMLFile($matchFullUrl);

        $stadium = null;
        $attendance = null;
        $referee = null;
        $referee2 = null;
        $referee3 = null;
        $referee4 = null;
        $refereeObserver = null;

        if($matchPage->findOneOrNull('/html/body/main/div/div[1]/div[1]/div/div[2]/h5') !== null) {
            $stadium = $this->stringToUtf8($matchPage->find('/html/body/main/div/div[1]/div[1]/div/div[2]/h5')->extract());
        }

         if($matchPage->findOneOrNull('/html/body/main/div/div[1]/div[2]/ul') !== null) {
             $matchItems = $matchPage->findAll('/html/body/main/div/div[1]/div[2]/ul/li');
             foreach($matchItems as $item) {
                 if(strpos($item->extract(), 'Attendance') !== false) {
                    $attendance = $item->find('b')->extract();
                 }
                 if(strpos($item->extract(), 'Referee') !== false) {
                     $referee = $this->stringToUtf8($item->find('b')->extract());
                 }
                 if(strpos($item->extract(), 'First assistant') !== false) {
                     $referee2 = $this->stringToUtf8($item->find('b')->extract());
                 }
                 if(strpos($item->extract(), 'Second assistant') !== false) {
                     $referee3 = $this->stringToUtf8($item->find('b')->extract());
                 }
                 if(strpos($item->extract(), 'Fourth official') !== false) {
                     $referee4 = $this->stringToUtf8($item->find('b')->extract());
                 }
                 if(strpos($item->extract(), 'Referee observer') !== false) {
                     $refereeObserver = $this->stringToUtf8($item->find('b')->extract());
                 }
             }
         }

        $playersRows = $matchPage->findAll('//*[@id="tabContent_1_2"]/div/table/tr');
        $starting_lineup = true;
        $itemSearchFor = 'a';
        $mainTeamPlayers = null;
        $opponentTeamPlayers = null;
        foreach ($playersRows as $row) {
            if ($row->extract() == 'Reserves') {
                $starting_lineup = false;
                $itemSearchFor = 'span';
            } elseif ($row->extract() == 'Coaches') {
                break;
            } else {
                $firstTeamPlayer = null;
                $secondTeamPlayer = null;
                $firstTeamPlayerItems = null;
                $secondTeamPlayerItems = null;
                $firstTeamPlayerUrl = null;
                $secondTeamPlayerUrl = null;

                if ($row->findOneOrNull('td[1]/' . $itemSearchFor) !== null) {
                    $firstTeamPlayer = $this->formatNameSurnameFromFullName($row->find('td[1]/' . $itemSearchFor)->extract());
                    if($itemSearchFor == 'a') {
                        $firstTeamPlayerUrl = $row->find('td[1]/' . $itemSearchFor. '/@href')->extract();
                    }
                    if ($row->findOneOrNull('td[1]/ul') !== null) {
                        $firstTeamPlayerItemsArr = $row->findAll('td[1]/ul/li');
                        foreach ($firstTeamPlayerItemsArr as $item) {
                            $itemType = $this->getMatchEventType($item->find('@class')->extract());
                            $minute = str_replace("'", "", $item->find('text()')->extract());
                            if(strpos('+', $minute) !== false) {
                                $minutesArr = explode('+', $minute);
                                $minute = (int) $minutesArr[0] + (int) $minutesArr[1];
                            }
                            $firstTeamPlayerItems[] = ['type' => $itemType, 'minute' => $minute];
                        }
                    }
                }

                if ($row->findOneOrNull('td[5]/' . $itemSearchFor) !== null) {
                    $secondTeamPlayer = $this->formatNameSurnameFromFullName($row->find('td[5]/' . $itemSearchFor)->extract());
                    if($itemSearchFor == 'a') {
                        $secondTeamPlayerUrl = $row->find('td[5]/' . $itemSearchFor. '/@href')->extract();
                    }
                    if ($row->findOneOrNull('td[5]/ul') !== null) {
                        $secondTeamPlayerItemsArr = $row->findAll('td[5]/ul/li');
                        foreach ($secondTeamPlayerItemsArr as $item) {
                            $itemType = $this->getMatchEventType($item->find('@class')->extract());
                            $minute = str_replace("'", "", $item->find('text()')->extract());
                            if(strpos('+', $minute) !== false) {
                                $minutesArr = explode('+', $minute);
                                $minute = (int) $minutesArr[0] + (int) $minutesArr[1];
                            }
                            $secondTeamPlayerItems[] = ['type' => $itemType, 'minute' => $minute];
                        }
                    }
                }

                if ($matchType == 'home') {
                    if ($firstTeamPlayer) {
                        $mainTeamPlayers[] = ['name_surname' => $firstTeamPlayer, 'url' => $firstTeamPlayerUrl, 'starting_lineup' => $starting_lineup, 'events' => $firstTeamPlayerItems];
                    }
                    if ($secondTeamPlayer) {
                        $opponentTeamPlayers[] = ['name_surname' => $secondTeamPlayer, 'url' => $secondTeamPlayerUrl, 'starting_lineup' => $starting_lineup, 'events' => $secondTeamPlayerItems];
                    }
                } else {
                    if ($secondTeamPlayer) {
                        $mainTeamPlayers[] = ['name_surname' => $secondTeamPlayer, 'url' => $secondTeamPlayerUrl, 'starting_lineup' => $starting_lineup, 'events' => $secondTeamPlayerItems];
                    }
                    if ($firstTeamPlayer) {
                        $opponentTeamPlayers[] = ['name_surname' => $firstTeamPlayer, 'url' => $firstTeamPlayerUrl, 'starting_lineup' => $starting_lineup, 'events' => $firstTeamPlayerItems];
                    }
                }
            }
        }

        $items = ['mainTeamPlayers' => $mainTeamPlayers, 'opponentTeamPlayers' => $opponentTeamPlayers, 'stadium' => $stadium, 'attendance' => $attendance, 'referee' => $referee, 'referee2' => $referee2, 'referee3' => $referee3, 'referee4' => $referee4, 'refereeObserver' => $refereeObserver];
        return $items;
    }

    private function proceedParsedMatches() {
        if($this->matchesArr) {
            foreach ($this->matchesArr as $parsedMatch) {
                $opponentTeam = Team::where('name', 'FK „' . $parsedMatch['opponentTeam'] . '“')->first();
                if (!$opponentTeam) {
                    $opponentTeam = new Team();
                    $opponentTeam->name = 'FK „' . $parsedMatch['opponentTeam'] . '“';
                    $opponentTeam->short_name = Str::limit(Str::upper(str_replace(' ', '', $parsedMatch['opponentTeam'])), 3, '');
                    $opponentTeam->country = 'Lietuva';
                    $opponentTeam->city = '-';
                    $opponentTeam->save();
                }

                $season = $parsedMatch['season'];
                $tournament = $parsedMatch['tournament'];

                $seasonTeamTournament = SeasonTeamTournament::where('team_id', $this->team->id)->where('season_id', $season->id)->where('tournament_id', $tournament->id)->first();
                if (!$seasonTeamTournament) {
                    $seasonTeamTournament = new SeasonTeamTournament();
                    $seasonTeamTournament->team_id = $this->team->id;
                    $seasonTeamTournament->season_id = $season->id;
                    $seasonTeamTournament->tournament_id = $tournament->id;
                    $seasonTeamTournament->save();
                }

                $match = new Match();
                $match->team_id = $this->team->id;
                $match->opponent_team_id = $opponentTeam->id;
                $match->season_id = $season->id;
                $match->tournament_id = $tournament->id;
                $match->type = $parsedMatch['type'];
                $match->team_score = $parsedMatch['mainTeamScore'];
                $match->opponent_team_score = $parsedMatch['opponentTeamScore'];
                $match->finished = true;
                $match->date = $parsedMatch['date']['date'];
                $match->time = $parsedMatch['date']['time'];
                $match->attendance = $parsedMatch['items']['attendance'];
                $match->location = $parsedMatch['items']['stadium'];
                $match->referee = $parsedMatch['items']['referee'];
                $match->referee2 = $parsedMatch['items']['referee2'];
                $match->referee3 = $parsedMatch['items']['referee3'];
                $match->referee4 = $parsedMatch['items']['referee4'];
                $match->referee_observer = $parsedMatch['items']['refereeObserver'];
                $match->save();

                $mainTeamParsedPlayers = $parsedMatch['items']['mainTeamPlayers'];
                $opponentTeamParsedPlayers = $parsedMatch['items']['opponentTeamPlayers'];

                $parsedPlayersBlocks = [
                    '0' => ['array' => $mainTeamParsedPlayers, 'type' => 'main'],
                    '1' => ['array' => $opponentTeamParsedPlayers, 'type' => 'opponent']
                ];

                foreach ($parsedPlayersBlocks as $block) {
                    $parsedPlayers = $block['array'];
                    $tmpTeam = $block['type'] == 'main' ? $this->team : $opponentTeam;
                    if ($parsedPlayers) {
                        foreach ($parsedPlayers as $parsedPlayer) {
                            $name = $parsedPlayer['name_surname']['name'];
                            $surname = $parsedPlayer['name_surname']['surname'];
                            $startingLineup = $parsedPlayer['starting_lineup'];
                            $matchEvents = $parsedPlayer['events'];

                            $player = Player::firstOrCreate(['name' => $name, 'surname' => $surname]);

                            if ($block['type'] == 'main') {
                                if((!$player->birth_date || $player->position || $player->country) && !in_array($player->id, $this->parsedPlayers) && $parsedPlayer['url']) {
                                    $playerInfoArr = $this->parsePlayer($parsedPlayer['url']);
                                    $player->birth_date = $playerInfoArr['birth_date'];
                                    $player->country = $playerInfoArr['country'];
                                    $player->position = $playerInfoArr['position'];
                                    $player->save();
                                    $this->parsedPlayers[] = $player->id;
                                }

                                $seasonTeamPlayer = SeasonTeamPlayer::where('team_id', $this->team->id)->where('season_id', $season->id)->where('player_id', $player->id)->first();
                                if (!$seasonTeamPlayer) {
                                    $seasonTeamPlayer = new SeasonTeamPlayer();
                                    $seasonTeamPlayer->player_id = $player->id;
                                    $seasonTeamPlayer->team_id = $this->team->id;
                                    $seasonTeamPlayer->season_id = $season->id;
                                    $seasonTeamPlayer->show_in_squad = true;
                                    $seasonTeamPlayer->save();
                                }
                            }

                            $matchPlayer = new MatchPlayer();
                            $matchPlayer->player_id = $player->id;
                            $matchPlayer->team_id = $tmpTeam->id;
                            $matchPlayer->match_id = $match->id;
                            $matchPlayer->starting_lineup = $startingLineup;
                            $matchPlayer->save();

                            if ($matchEvents) {
                                foreach ($matchEvents as $event) {
                                    if ($event['type']) {
                                        $matchEvent = new MatchEvent();
                                        $matchEvent->match_id = $match->id;
                                        $matchEvent->player_id = $player->id;
                                        $matchEvent->team_id = $tmpTeam->id;
                                        $matchEvent->type = $event['type'];
                                        $matchEvent->minute = $event['minute'];
                                        $matchEvent->save();
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function parsePlayer($url) {
        $playerPage = Selector::loadHTMLFile($this->url . '/zaidejai' . str_replace('/en/players', '', $url));

        $birthDate = null;
        $country = null;
        $position = null;

        $birthDate = $this->formatDate(str_replace('Gimimo data', '', $this->stringToUtf8($playerPage->find('/html/body/main/div/div[1]/div[1]/div[3]/ul/li[1]/text()')->extract())));
        $country = $this->stringToUtf8($playerPage->find('/html/body/main/div/div[1]/div[1]/div[3]/ul/li[2]/text()')->extract());
        $position = $this->getPosition($this->stringToUtf8($playerPage->find('/html/body/main/div/div[1]/div[1]/div[3]/ul/li[3]/text()')->extract()));

        return ['birth_date' => $birthDate, 'country' => $country, 'position' => $position];
    }

    private function getPosition($position) {
        switch ($position) {
            case 'Vartininkas':
                return 'goalkeeper';
                break;
            case 'Gynėjas':
                return 'defender';
                break;
            case 'Saugas':
                return 'midfielder';
                break;
            case 'Puolėjas':
                return 'striker';
                break;
        }
        return null;
    }

    private function getMatchEventType($str)
    {
        switch ($str) {
            case 'yellow':
                $type = 'yellow_card';
                break;
            case 'red':
                $type = 'red_card';
                break;
            case 'penalty':
                $type = 'penalty_goal';
                break;
            case 'penalty_failed':
                $type = 'penalty_fail';
                break;
            case 'goal':
                $type = 'goal';
                break;
            case 'own_goal':
                $type = 'own_goal';
                break;
            case 'substitutionOut':
                $type = 'sub_out';
                break;
            case 'substitutionIn':
                $type = 'sub_in';
                break;
            default:
                $type = null;
        }
        return $type;
    }

    private function formatNameSurnameFromFullName($fullName)
    {
        $fullName = $this->stringToUtf8($fullName);
        $fullName = str_replace(' (C)', '', $fullName);
        $fullName = str_replace(' (G)', '', $fullName);
        $fullName = str_replace(' (V)', '', $fullName);
        $fullNameParts = explode(' ', $fullName);
        $name = $fullNameParts[0];
        for ($i = 1; $i < count($fullNameParts); $i++) {
            $surnameArr[] = $fullNameParts[$i];
        }
        $surname = implode(' ', $surnameArr);
        return ['name' => $name, 'surname' => $surname];
    }

    private function stringToUtf8($str)
    {
        if (utf8_encode(utf8_decode($str)) == $str) {
            return utf8_decode($str);
        } else {
            return $str;
        }
    }


    private function lastMatchesPage()
    {
        $mainPage = Selector::loadHTMLFile($this->url . '/en/clubs/' . $this->team_slug . '/?tab=fixtures' . ($this->competition_id ? '&cid=' . $this->competition_id : ''));
        if ($mainPage->findOneOrNull('//*[@id="tabContent_1_2"]') !== null) {
            $this->mainTab = 'tabContent_1_2';
        } else {
            $this->mainTab = 'tabContent_1_1';
        }
        $lastPageNumber = null;
        try {
            $pagination = $mainPage->findAll('//*[@id="' . $this->mainTab . '"]/div/div/div/a/text()');
            $pageCounter = 1;
            foreach ($pagination as $page) {
                if ($pageCounter == count($pagination) - 1) {
                    $lastPageNumber = $page->extract();
                    break;
                }
                $pageCounter++;
            }
        } catch (NodeNotFoundException $e) {
            echo $e->getMessage();
        }

        return $lastPageNumber;
    }

    private function getMatchDateTimeArrByRow($matchRow)
    {
        $date = $this->formatDate($matchRow->find('td[1]/div[1]/text()')->extract());
        $time = $matchRow->find('td[1]/div[2]/text()')->extract();
        return ['date' => $date, 'time' => $time];
    }

    private function formatDate($date)
    {
        if (strpos($date, '.') !== false) {
            $dateArr = explode('.', $date);

            $formatedDate = $dateArr[2] . '-' . $dateArr[1] . '-' . $dateArr[0];
        } else {
            $formatedDate = $date;
        }
        return $formatedDate;
    }

    private function replaceTeamSymbols($teamName)
    {
        if ($teamName != $this->teamNameInParsingWebsite) {
            $teamName = str_replace('FK ', '', $teamName);
            $teamName = str_replace('FC ', '', $teamName);
            $teamName = str_replace('FK', '', $teamName);
            $teamName = str_replace('FC', '', $teamName);
            $teamName = str_replace('-2', ' B', $teamName);
            $teamName = str_replace('- 2', ' B', $teamName);
            $teamName = str_replace('2', 'B', $teamName);
        }
        return $teamName;
    }

    private function getTournament($tournamentString)
    {
        $replaceArr = [
            'A Liga1' => 'A lyga',
            'A Lyga 2014 ' => 'A lyga',
            'LFFTau1' => 'LFF Taurė',
            '2 Lyga3' => 'II lyga',
            'Dubleriai' => 'Dublerių čempionatas',
            '1 Lyga 2019' => 'I lyga',
            'I lyga 2018' => 'I lyga',
            '1 Lyga 2017' => 'I lyga',
            'I Lyga 2016' => 'I lyga',
            'II Lyga Pietų zona 2016' => 'II lyga',
            'II lyga Pietų zona 2018' => 'II lyga',
        ];

        if (isset($replaceArr[$tournamentString])) {
            $tournamentString = $replaceArr[$tournamentString];
        }

        $tournament = Tournament::firstOrCreate(['title' => $tournamentString]);

        return $tournament;
    }

    public function test()
    {
        $firstTeam = Team::where('id', 1)->first();
        $secondTeam = Team::where('id', 2)->first();

        $parserArr = [
            '0' => ['team' => $firstTeam, 'slug' => 'dainava-1458', 'name' => 'Dainava'],
            '1' => ['team' => $firstTeam, 'slug' => 'dfk-dainava-8156', 'name' => 'DFK Dainava', 'comp_id' => '3658320'],
            '2' => ['team' => $firstTeam, 'slug' => 'dfk-dainava-8156', 'name' => 'DFK Dainava', 'comp_id' => '1816595'],
            '3' => ['team' => $firstTeam, 'slug' => 'dfk-dainava-8156', 'name' => 'DFK Dainava', 'comp_id' => '803684'],
            '4' => ['team' => $firstTeam, 'slug' => 'dfk-dainava-8156', 'name' => 'DFK Dainava', 'comp_id' => '358506'],
            '5' => ['team' => $secondTeam, 'slug' => 'dainava-2-1445', 'name' => 'Dainava-2'],
            '6' => ['team' => $secondTeam, 'slug' => 'dfk-dainava-b-13810', 'name' => 'DFK Dainava B'],
            '7' => ['team' => $secondTeam, 'slug' => 'dfk-dainava-2-src-8912', 'name' => 'DFK Dainava 2-SRC'],
        ];

        foreach ($parserArr as $parserItems) {
            unset($matches);
            unset($parser);
            $parser = new LietuvosFutbolasParser();
            if (isset($parserItems['comp_id'])) {
                $parser->parseMatches($parserItems['slug'], $parserItems['name'], $parserItems['team'], $parserItems['comp_id']);
            } else {
                $parser->parseMatches($parserItems['slug'], $parserItems['name'], $parserItems['team']);
            }
        }
    }
}
