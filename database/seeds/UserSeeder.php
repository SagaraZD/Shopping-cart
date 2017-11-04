<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_member = Role::where('name', 'Member')->first();

        $role_admin = Role::where('name', 'Admin')->first();

        $member = new User();
        $member->FirstName = 'Victor';
        $member->LastName = 'Member';
        $member->email = 'member@test.com';
        $member->password = bcrypt('12345');
        $member->save();
        $member->roles()->attach($role_member);


        $admin = new User();
        $admin->FirstName = 'Alex';
        $admin->LastName = 'Admin';
        $admin->email = 'admin@test.com';
        $admin->password = bcrypt('12345');
        $admin->save();
        $admin->roles()->attach($role_admin);

    }
}
