<?php

use Illuminate\Database\Seeder;

class UsersRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = App\Role::all();
        $users = App\User::where('id','!=','1')->get();

        // Populate the pivot table
        foreach ($users as $user) {
            $user->roles()->attach(
                $roles->random(1)->pluck('id'));
        }
    }
}
