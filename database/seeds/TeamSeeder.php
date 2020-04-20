<?php

use App\Team;
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
            'email' => 'dfkdainava@gmail.com'
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
            'related_team_id' => 1
        ]);
    }
}
