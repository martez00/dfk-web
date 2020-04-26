<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$GkzUHzWBQjkBs8WaSTIP0ur2KXvE3q8lJG5ZpkUBO6w9couKy8/Wi',
                'remember_token' => NULL,
                'created_at' => '2020-04-26 07:46:17',
                'updated_at' => '2020-04-26 07:46:17',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'editor',
                'email' => 'editor@editor.com',
                'password' => '$2y$10$qtATlSaXm0t4MO6QyCPzZeIKisuHzga37GLma5pRbqEz/zBA9Y0QG',
                'remember_token' => NULL,
                'created_at' => '2020-04-26 07:46:17',
                'updated_at' => '2020-04-26 07:46:17',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'stats_admin',
                'email' => 'stats_admin@stats_admin.com',
                'password' => '$2y$10$.GmQBcOisc12J3ZmTBgZHeTzcpxht5e.mxsWixP935dvjg2.otCUi',
                'remember_token' => NULL,
                'created_at' => '2020-04-26 07:46:17',
                'updated_at' => '2020-04-26 07:46:17',
            ),
        ));
        
        
    }
}