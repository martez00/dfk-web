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
        $roleUserAdmin = new RoleUser();
        $roleUserAdmin->role_id = Role::where('name', 'admin')->firstOrFail()->id;
        $roleUserAdmin->user_id = 1;
        $roleUserAdmin->save();

        $roleUserEditor = new RoleUser();
        $roleUserEditor->role_id = Role::where('name', 'editor')->firstOrFail()->id;
        $roleUserEditor->user_id = 2;
        $roleUserEditor->save();

        $roleUserStatsAdmin = new RoleUser();
        $roleUserStatsAdmin->role_id = Role::where('name', 'stats_admin')->firstOrFail()->id;
        $roleUserStatsAdmin->user_id = 3;
        $roleUserStatsAdmin->save();
    }
}
