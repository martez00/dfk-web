<?php

use App\Tournament;
use Illuminate\Database\Seeder;

class TournamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Tournament::create([
           'title' => 'A lyga',
           'level' => '1'
       ]);

        Tournament::create([
            'title' => 'I lyga',
            'level' => '2'
        ]);

        Tournament::create([
            'title' => 'II lyga',
            'level' => '3'
        ]);

        Tournament::create([
            'title' => 'LFF Taurė',
            'cup_tournament' => true
        ]);

        Tournament::create([
            'title' => 'Dublerių čempionatas'
        ]);

        Tournament::create([
            'title' => 'Draugiškos rungtynės'
        ]);
    }
}
