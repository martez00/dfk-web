<?php

use App\Team;
use App\Tournament;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::create([
            'name' => 'DFK „Dainava“',
            'short_name' => 'DAI',
            'country' => 'Lietuva',
            'city' => 'Alytus',
            'phone_number' => '+370 612 61166',
            'address' => 'S. Dariaus ir S. Girėno g. 2-12, Alytus, LT-62137',
            'website' => 'http://www.dfkdainava.com',
            'email' => 'dfkdainava@gmail.com',
            'current_tournament_id' => Tournament::where('title', 'I lyga')->first()->id
        ]);

        Team::create([
            'name' => 'DFK „Dainava B“',
            'short_name' => 'DAI',
            'country' => 'Lietuva',
            'city' => 'Alytus',
            'phone_number' => '+370 612 61166',
            'address' => 'S. Dariaus ir S. Girėno g. 2-12, Alytus, LT-62137',
            'website' => 'http://www.dfkdainava.com',
            'email' => 'dfkdainava@gmail.com',
            'related_team_id' => 1,
            'current_tournament_id' => Tournament::where('title', 'II lyga')->first()->id
        ]);

        $relatedTeam = Team::create([
            'name' => 'FK „Žalgiris“',
            'short_name' => 'ŽAL',
            'country' => 'Lietuva',
            'city' => 'Vilnius',
            'current_tournament_id' => Tournament::where('title', 'A lyga')->first()->id
        ]);

        Team::create([
            'name' => 'FK „Žalgiris B“',
            'short_name' => 'ŽAL',
            'country' => 'Lietuva',
            'city' => 'Vilnius',
            'current_tournament_id' => Tournament::where('title', 'I lyga')->first()->id,
            'related_team_id' => $relatedTeam->id
        ]);

        $relatedTeam = Team::create([
            'name' => 'FK „Kauno Žalgiris“',
            'short_name' => 'FKŽ',
            'country' => 'Lietuva',
            'city' => 'Kaunas',
            'current_tournament_id' => Tournament::where('title', 'A lyga')->first()->id
        ]);

        Team::create([
            'name' => 'FK „Kauno Žalgiris B“',
            'short_name' => 'FKŽ',
            'country' => 'Lietuva',
            'city' => 'Kaunas',
            'current_tournament_id' => Tournament::where('title', 'I lyga')->first()->id,
            'related_team_id' => $relatedTeam->id
        ]);

        $relatedTeam = Team::create([
            'name' => 'FK „Sūduva“',
            'short_name' => 'SŪD',
            'country' => 'Lietuva',
            'city' => 'Marijampolė',
            'current_tournament_id' => Tournament::where('title', 'A lyga')->first()->id
        ]);

        Team::create([
            'name' => 'FK „Sūduva B“',
            'short_name' => 'SŪD',
            'country' => 'Lietuva',
            'city' => 'Marijampolė',
            'current_tournament_id' => Tournament::where('title', 'II lyga')->first()->id,
            'related_team_id' => $relatedTeam->id
        ]);

        $relatedTeam = Team::create([
            'name' => 'FK „Banga“',
            'short_name' => 'BAN',
            'country' => 'Lietuva',
            'city' => 'Gargždai',
            'current_tournament_id' => Tournament::where('title', 'A lyga')->first()->id
        ]);

        Team::create([
            'name' => 'FK „Banga B“',
            'short_name' => 'BAN',
            'country' => 'Lietuva',
            'city' => 'Gargždai',
            'current_tournament_id' => Tournament::where('title', 'II lyga')->first()->id,
            'related_team_id' => $relatedTeam->id
        ]);
    }
}
