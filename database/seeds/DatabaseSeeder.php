<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(SeasonSeeder::class);
        $this->call(TournamentSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(SeasonTeamTournamentsSeeder::class);

        Model::reguard();
    }
}
