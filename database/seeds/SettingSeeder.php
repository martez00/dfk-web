<?php

use App\Season;
use App\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'name' => 'main_team',
            'value' => 1
        ]);
        Setting::create([
            'name' => 'current_season',
            'value' => Season::orderBy('id', 'DESC')->first()->id
        ]);
    }
}
