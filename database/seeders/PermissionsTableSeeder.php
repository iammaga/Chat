<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Laratrust\Models\LaratrustRole;
use Laratrust\Models\LaratrustPermission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manageUsers = new LaratrustPermission(['name' => 'manage-users']);
        $manageUsers->save();

        $manageChats = new LaratrustPermission(['name' => 'manage-chats']);
        $manageChats->save();
    }
}
