<?php

namespace App\Tools;

use App\Season;
use App\Tournament;
use XPathSelector\Exception\NodeNotFoundException;
use XPathSelector\Selector;

class LietuvosFutbolasParser
{
    public $matchesArr = null;
    private $url = 'http://lietuvosfutbolas.lt';
    private $team_slug = null;
    private $teamNameInParsingWebsite = null;
    private $team = null;

    public function parse($team_slug, $teamNameInParsingWebsite, $team)
    {
        $this->team_slug = $team_slug;
        $this->teamNameInParsingWebsite = $teamNameInParsingWebsite;
        $this->team = $team;

        $currentPageUrl = $this->lastMatchesPage();
        if ($currentPageUrl) {
            while ($currentPageUrl >= 1) {
                if ($currentPageUrl > 1) {
                    $resultsPageUrl = $this->url . '/en/clubs/' . $this->team_slug . '/?pg='.$currentPageUrl.'&tab=fixtures';
                } else {
                    $resultsPageUrl = $this->url . '/en/clubs/' . $this->team_slug . '/?tab=fixtures';
                }

                $resultsPage = Selector::loadHTMLFile($resultsPageUrl);

                $matchesCount = count($resultsPage->findAll('//*[@id="tabContent_1_1"]/div/table/tr'));
                while ($matchesCount > 1) {
                    $matchRow = $resultsPage->find('//*[@id="tabContent_1_1"]/div/table/tr[' . $matchesCount . ']');
                    $dateTime = $this->getMatchDateTimeArrByRow($matchRow);
                    $team1 = $this->replaceTeamSymbols($matchRow->find('td[3]/a/text()')->extract());
                    $team2 = $this->replaceTeamSymbols($matchRow->find('td[4]/a/text()')->extract());
                    $matchType = $team1 == $this->teamNameInParsingWebsite ? 'home' : 'away';

                    $team1Score = $matchRow->find('td[5]/div/a/span[1]/text()')->extract();
                    $team2Score = $matchRow->find('td[5]/div/a/span[3]/text()')->extract();

                    $tournament = $this->getTournament($matchRow->find('td[2]')->extract());

                    $season = Season::where('start_date', '<=', $dateTime['date'])->where('end_date', '>=',
                        $dateTime['date'])->first();
                    if ( ! $season) {
                        $year = date("Y", strtotime($dateTime['date']));
                        $season = new Season();
                        $season->title = $year . ' metų sezonas';
                        $season->start_date = $year . '-01-01';
                        $season->end_date = $year . '-12-31';
                        $season->save();
                    }

                    $matchesArr[] = [
                        'mainTeamModel' => $this->team,
                        'mainTeam' => $team1 == $this->teamNameInParsingWebsite ? $team1 : $team2,
                        'mainTeamScore' => $team1 == $this->teamNameInParsingWebsite ? $team1Score : $team2Score,
                        'opponentTeam' => $team1 == $this->teamNameInParsingWebsite ? $team2 : $team1,
                        'opponentTeamScore' => $team1 == $this->teamNameInParsingWebsite ? $team2Score : $team1Score,
                        'season' => $season,
                        'tournament' => $tournament,
                        'type' => $matchType,
                        'date' => $dateTime
                    ];
                    $matchesCount--;
                }
                $currentPageUrl--;
            }
            $this->matchesArr = $matchesArr;
        }
    }

    private function lastMatchesPage()
    {
        $mainPage = Selector::loadHTMLFile($this->url . '/en/clubs/' . $this->team_slug . '/');

        $lastPageNumber = null;
        try {
            $pagination = $mainPage->findAll('//*[@id="tabContent_1_1"]/div/div/div/a/text()');
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
        $dateArr = explode('.', $date);

        $formatedDate = $dateArr[2] . '-' . $dateArr[1] . '-' . $dateArr[0];
        return $formatedDate;
    }

    private function replaceTeamSymbols($teamName)
    {
        if($teamName != $this->teamNameInParsingWebsite) {
            $teamName = str_replace('FK ', '', $teamName);
            $teamName = str_replace('FK', '', $teamName);
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
            'Dubleriai' => 'Dublerių čempionatas'
        ];

        if (isset($replaceArr[$tournamentString])) {
            $tournamentString = $replaceArr[$tournamentString];
        }

        $tournament = Tournament::firstOrCreate(['title' => $tournamentString]);

        return $tournament;
    }
}