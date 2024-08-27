<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Laratrust\Models\LaratrustRole;
use Laratrust\Models\LaratrustPermission;
use Laratrust\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $userIds = \App\Models\User::pluck('id');

        $roleIds = \App\Models\Role::pluck('id');

        if ($userIds->isEmpty() || $roleIds->isEmpty()) {
            $this->command->info('No users or roles found. Seed users and roles first.');
            return;
        }

        foreach ($userIds as $userId) {
            foreach ($roleIds as $roleId) {
                DB::table('role_user')->insert([
                    'user_id' => $userId,
                    'role_id' => $roleId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
