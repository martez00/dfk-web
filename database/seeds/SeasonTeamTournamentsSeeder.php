<?php

use Illuminate\Database\Seeder;

class SeasonTeamTournamentsSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('season_team_tournaments')->delete();
        
        \DB::table('season_team_tournaments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'team_id' => 1,
                'season_id' => 10,
                'tournament_id' => 2
            ),
            1 => 
            array (
                'id' => 2,
                'team_id' => 1,
                'season_id' => 10,
                'tournament_id' => 4
            ),
            2 => 
            array (
                'id' => 3,
                'team_id' => 2,
                'season_id' => 10,
                'tournament_id' => 3
            ),
            3 => 
            array (
                'id' => 4,
                'team_id' => 1,
                'season_id' => 9,
                'tournament_id' => 2
            ),
            4 => 
            array (
                'id' => 5,
                'team_id' => 1,
                'season_id' => 9,
                'tournament_id' => 4
            ),
            5 => 
            array (
                'id' => 6,
                'team_id' => 1,
                'season_id' => 8,
                'tournament_id' => 2
            ),
            6 => 
            array (
                'id' => 7,
                'team_id' => 1,
                'season_id' => 8,
                'tournament_id' => 4
            ),
            7 => 
            array (
                'id' => 8,
                'team_id' => 2,
                'season_id' => 8,
                'tournament_id' => 3
            ),
            8 => 
            array (
                'id' => 9,
                'team_id' => 1,
                'season_id' => 7,
                'tournament_id' => 2
            ),
            9 => 
            array (
                'id' => 10,
                'team_id' => 1,
                'season_id' => 7,
                'tournament_id' => 4
            ),
            10 => 
            array (
                'id' => 11,
                'team_id' => 1,
                'season_id' => 6,
                'tournament_id' => 2
            ),
            11 => 
            array (
                'id' => 12,
                'team_id' => 1,
                'season_id' => 6,
                'tournament_id' => 4
            ),
            12 => 
            array (
                'id' => 13,
                'team_id' => 1,
                'season_id' => 5,
                'tournament_id' => 3
            ),
            13 => 
            array (
                'id' => 14,
                'team_id' => 1,
                'season_id' => 4,
                'tournament_id' => 1
            ),
            14 => 
            array (
                'id' => 15,
                'team_id' => 1,
                'season_id' => 3,
                'tournament_id' => 1
            ),
            15 => 
            array (
                'id' => 16,
                'team_id' => 1,
                'season_id' => 3,
                'tournament_id' => 4
            ),
            16 => 
            array (
                'id' => 17,
                'team_id' => 1,
                'season_id' => 4,
                'tournament_id' => 4
            ),
            17 => 
            array (
                'id' => 18,
                'team_id' => 2,
                'season_id' => 4,
                'tournament_id' => 5
            ),
            18 => 
            array (
                'id' => 19,
                'team_id' => 1,
                'season_id' => 2,
                'tournament_id' => 1
            ),
            19 => 
            array (
                'id' => 20,
                'team_id' => 1,
                'season_id' => 1,
                'tournament_id' => 1
            ),
            20 => 
            array (
                'id' => 21,
                'team_id' => 1,
                'season_id' => 2,
                'tournament_id' => 4
            ),
        ));
        
        
    }
}
