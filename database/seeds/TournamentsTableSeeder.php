<?php

use Illuminate\Database\Seeder;

class TournamentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tournaments')->delete();
        
        \DB::table('tournaments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'A lyga',
                'level' => 1,
                'created_at' => '2020-04-26 07:46:17',
                'updated_at' => '2020-04-26 07:46:17',
                'cup_tournament' => 0,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'I lyga',
                'level' => 2,
                'created_at' => '2020-04-26 07:46:17',
                'updated_at' => '2020-04-26 07:46:17',
                'cup_tournament' => 0,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'II lyga',
                'level' => 3,
                'created_at' => '2020-04-26 07:46:17',
                'updated_at' => '2020-04-26 07:46:17',
                'cup_tournament' => 0,
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'LFF Taurė',
                'level' => NULL,
                'created_at' => '2020-04-26 07:46:17',
                'updated_at' => '2020-04-26 07:46:17',
                'cup_tournament' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Dublerių čempionatas',
                'level' => NULL,
                'created_at' => '2020-04-26 07:46:17',
                'updated_at' => '2020-04-26 07:46:17',
                'cup_tournament' => 0,
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'Draugiškos rungtynės',
                'level' => NULL,
                'created_at' => '2020-04-26 07:46:17',
                'updated_at' => '2020-04-26 07:46:17',
                'cup_tournament' => 0,
            ),
        ));
        
        
    }
}