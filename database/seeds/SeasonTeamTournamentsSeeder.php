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
                'tournament_id' => 2,
                'created_at' => '2020-04-22 05:40:18',
                'updated_at' => '2020-04-22 05:40:18',
            ),
            1 => 
            array (
                'id' => 2,
                'team_id' => 1,
                'season_id' => 10,
                'tournament_id' => 4,
                'created_at' => '2020-04-22 05:40:18',
                'updated_at' => '2020-04-22 05:40:18',
            ),
            2 => 
            array (
                'id' => 3,
                'team_id' => 2,
                'season_id' => 10,
                'tournament_id' => 3,
                'created_at' => '2020-04-22 05:40:18',
                'updated_at' => '2020-04-22 05:40:18',
            ),
            3 => 
            array (
                'id' => 4,
                'team_id' => 1,
                'season_id' => 9,
                'tournament_id' => 2,
                'created_at' => '2020-04-22 05:40:28',
                'updated_at' => '2020-04-22 05:40:28',
            ),
            4 => 
            array (
                'id' => 5,
                'team_id' => 1,
                'season_id' => 9,
                'tournament_id' => 4,
                'created_at' => '2020-04-22 05:40:28',
                'updated_at' => '2020-04-22 05:40:28',
            ),
            5 => 
            array (
                'id' => 6,
                'team_id' => 1,
                'season_id' => 8,
                'tournament_id' => 2,
                'created_at' => '2020-04-22 05:40:39',
                'updated_at' => '2020-04-22 05:40:39',
            ),
            6 => 
            array (
                'id' => 7,
                'team_id' => 1,
                'season_id' => 8,
                'tournament_id' => 4,
                'created_at' => '2020-04-22 05:40:39',
                'updated_at' => '2020-04-22 05:40:39',
            ),
            7 => 
            array (
                'id' => 8,
                'team_id' => 2,
                'season_id' => 8,
                'tournament_id' => 3,
                'created_at' => '2020-04-22 05:40:39',
                'updated_at' => '2020-04-22 05:40:39',
            ),
            8 => 
            array (
                'id' => 9,
                'team_id' => 1,
                'season_id' => 7,
                'tournament_id' => 2,
                'created_at' => '2020-04-22 05:41:20',
                'updated_at' => '2020-04-22 05:41:20',
            ),
            9 => 
            array (
                'id' => 10,
                'team_id' => 1,
                'season_id' => 7,
                'tournament_id' => 4,
                'created_at' => '2020-04-22 05:41:20',
                'updated_at' => '2020-04-22 05:41:20',
            ),
            10 => 
            array (
                'id' => 11,
                'team_id' => 1,
                'season_id' => 6,
                'tournament_id' => 2,
                'created_at' => '2020-04-22 05:41:28',
                'updated_at' => '2020-04-22 05:41:28',
            ),
            11 => 
            array (
                'id' => 12,
                'team_id' => 1,
                'season_id' => 6,
                'tournament_id' => 4,
                'created_at' => '2020-04-22 05:41:28',
                'updated_at' => '2020-04-22 05:41:28',
            ),
            12 => 
            array (
                'id' => 13,
                'team_id' => 1,
                'season_id' => 5,
                'tournament_id' => 3,
                'created_at' => '2020-04-22 05:42:38',
                'updated_at' => '2020-04-22 05:42:38',
            ),
            13 => 
            array (
                'id' => 14,
                'team_id' => 1,
                'season_id' => 4,
                'tournament_id' => 1,
                'created_at' => '2020-04-22 05:42:55',
                'updated_at' => '2020-04-22 05:42:55',
            ),
            14 => 
            array (
                'id' => 15,
                'team_id' => 1,
                'season_id' => 3,
                'tournament_id' => 1,
                'created_at' => '2020-04-22 05:43:06',
                'updated_at' => '2020-04-22 05:43:06',
            ),
            15 => 
            array (
                'id' => 16,
                'team_id' => 1,
                'season_id' => 3,
                'tournament_id' => 4,
                'created_at' => '2020-04-22 05:43:09',
                'updated_at' => '2020-04-22 05:43:09',
            ),
            16 => 
            array (
                'id' => 17,
                'team_id' => 1,
                'season_id' => 4,
                'tournament_id' => 4,
                'created_at' => '2020-04-22 05:43:18',
                'updated_at' => '2020-04-22 05:43:18',
            ),
            17 => 
            array (
                'id' => 18,
                'team_id' => 2,
                'season_id' => 4,
                'tournament_id' => 5,
                'created_at' => '2020-04-22 05:44:15',
                'updated_at' => '2020-04-22 05:44:15',
            ),
            18 => 
            array (
                'id' => 19,
                'team_id' => 1,
                'season_id' => 2,
                'tournament_id' => 1,
                'created_at' => '2020-04-22 05:45:41',
                'updated_at' => '2020-04-22 05:45:41',
            ),
            19 => 
            array (
                'id' => 20,
                'team_id' => 1,
                'season_id' => 1,
                'tournament_id' => 1,
                'created_at' => '2020-04-22 05:48:42',
                'updated_at' => '2020-04-22 05:48:42',
            ),
            20 => 
            array (
                'id' => 21,
                'team_id' => 1,
                'season_id' => 2,
                'tournament_id' => 4,
                'created_at' => '2020-04-22 05:59:24',
                'updated_at' => '2020-04-22 05:59:24',
            ),
        ));
        
        
    }
}