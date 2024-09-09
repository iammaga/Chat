<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Laratrust\Models\LaratrustPermission;
use Laratrust\Models\LaratrustRole;
use Laratrust\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Role::firstOrCreate(
            ['name' => 'admin'],
            ['display_name' => 'Administrator', 'description' => 'Admin role'],
            ['description' => 'Administrator role']
        );

        Role::firstOrCreate(
            ['name' => 'editor'],
            ['display_name' => 'Editor', 'description' => 'Editor role'],
            ['description' => 'Editor role']
        );

        Role::firstOrCreate(
            ['name' => 'user'],
            ['display_name' => 'User', 'description' => 'Regular user'],
            ['description' => 'Regular user']
        );
    }
}
