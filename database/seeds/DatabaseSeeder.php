<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

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
        Schema::disableForeignKeyConstraints();

        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleUsersTableSeeder::class);
        $this->call(SeasonsTableSeeder::class);
        $this->call(TournamentsTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(SeasonTeamTournamentsTableSeeder::class);
        $this->call(PlayersTableSeeder::class);
        $this->call(SeasonTeamPlayersTableSeeder::class);
        $this->call(MatchesTableSeeder::class);
        $this->call(MatchPlayersTableSeeder::class);
        $this->call(MatchEventsTableSeeder::class);
        
        Schema::enableForeignKeyConstraints();
        Model::reguard();
    }
}
