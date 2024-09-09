<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $roles = Role::all();

        foreach ($users as $user) {
            $randomRole = $roles->random();

            $user->roles()->attach($randomRole->id);
        }

        foreach ($users as $user) {
            $randomRoles = $roles->random(rand(1, 3));

            foreach ($randomRoles as $role) {
                $user->roles()->syncWithoutDetaching($role->id);
            }
        }
    }
}
