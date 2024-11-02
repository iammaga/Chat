<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class LaratrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'manage-users', 'display_name' => 'Управление пользователями', 'description' => 'Разрешение на управление пользователями'],
            ['name' => 'edit-profile', 'display_name' => 'Редактирование профиля', 'description' => 'Разрешение на редактирование профиля'],
        ];

        foreach ($permissions as $permissionData) {
            Permission::updateOrCreate(['name' => $permissionData['name']], $permissionData);
        }

        $roles = [
            ['name' => 'admin', 'display_name' => 'Администратор', 'description' => 'Полный доступ к системе'],
            ['name' => 'user', 'display_name' => 'Пользователь', 'description' => 'Обычный пользователь с ограниченными правами'],
        ];

        foreach ($roles as $roleData) {
            $role = Role::updateOrCreate(['name' => $roleData['name']], $roleData);
        }

        $rolePermissions = [
            'admin' => ['manage-users'],
            'user' => ['edit-profile'],
        ];

        foreach ($rolePermissions as $roleName => $permissionNames) {
            $role = Role::where('name', $roleName)->first();
            $permissions = Permission::whereIn('name', $permissionNames)->pluck('id');
            $role->permissions()->sync($permissions);
        }

        $userRoles = [
            1 => 'admin',
            2 => 'user',
        ];

        foreach ($userRoles as $userId => $roleName) {
            $user = User::find($userId);
            $role = Role::where('name', $roleName)->first();
            if ($user && $role) {
                $user->roles()->sync([$role->id]);
            }
        }
    }
}
