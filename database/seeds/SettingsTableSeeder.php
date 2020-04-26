<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'main_team',
                'value' => '1',
                'created_at' => '2020-04-26 07:46:17',
                'updated_at' => '2020-04-26 07:46:17',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'current_season',
                'value' => '10',
                'created_at' => '2020-04-26 07:46:17',
                'updated_at' => '2020-04-26 07:46:17',
            ),
        ));
        
        
    }
}