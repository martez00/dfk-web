<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        self::createUser('admin');
        self::createUser('editor');
        self::createUser('stats_admin');
    }

    private static function createUser($name)
    {
        $user = new User();
        $user->name = $name;
        $user->email = "$name@$name.com";
        $user->password = $name;
        $user->save();
    }
}
