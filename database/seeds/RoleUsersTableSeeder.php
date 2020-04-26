<?php

use Illuminate\Database\Seeder;

class RoleUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_users')->delete();
        
        \DB::table('role_users')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'user_id' => 1,
                'created_at' => '2020-04-26 07:46:17',
                'updated_at' => '2020-04-26 07:46:17',
            ),
            1 => 
            array (
                'role_id' => 2,
                'user_id' => 1,
                'created_at' => '2020-04-26 07:46:17',
                'updated_at' => '2020-04-26 07:46:17',
            ),
            2 => 
            array (
                'role_id' => 3,
                'user_id' => 1,
                'created_at' => '2020-04-26 07:46:17',
                'updated_at' => '2020-04-26 07:46:17',
            ),
            3 => 
            array (
                'role_id' => 2,
                'user_id' => 2,
                'created_at' => '2020-04-26 07:46:17',
                'updated_at' => '2020-04-26 07:46:17',
            ),
            4 => 
            array (
                'role_id' => 3,
                'user_id' => 3,
                'created_at' => '2020-04-26 07:46:17',
                'updated_at' => '2020-04-26 07:46:17',
            ),
        ));
        
        
    }
}