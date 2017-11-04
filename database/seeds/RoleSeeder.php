<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $role_user = new Role();
    $role_user->name = 'Member';
    $role_user->description = 'A Member';
    $role_user->save();

    $role_admin = new Role();
    $role_admin->name = 'Admin';
    $role_admin->description = 'The Admin';
    $role_admin->save();
    }
}
