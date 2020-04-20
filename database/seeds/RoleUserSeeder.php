<?php

use App\Role;
use App\RoleUser;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoleUser::create([
            'role_id' => Role::where('name', 'admin')->firstOrFail()->id,
            'user_id' => 1
        ]);

        RoleUser::create([
            'role_id' => Role::where('name', 'editor')->firstOrFail()->id,
            'user_id' => 1
        ]);

        RoleUser::create([
            'role_id' => Role::where('name', 'stats_admin')->firstOrFail()->id,
            'user_id' => 1
        ]);

        RoleUser::create([
            'role_id' => Role::where('name', 'editor')->firstOrFail()->id,
            'user_id' => 2
        ]);

        RoleUser::create([
            'role_id' => Role::where('name', 'stats_admin')->firstOrFail()->id,
            'user_id' => 3
        ]);
    }
}
