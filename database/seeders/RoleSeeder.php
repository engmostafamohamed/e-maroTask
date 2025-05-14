<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'manage products',
            'view products',
            'create products',
            'delete products',
            'update products',
            'manage categories',
            'view categories',
            'create categories',
            'delete categories',
            'update categories',
        ];

        $guards = ['web', 'api'];

        foreach ($guards as $guard) {
            // Create or update permissions for each guard
            foreach ($permissions as $permission) {
                Permission::updateOrCreate(
                    ['name' => $permission, 'guard_name' => $guard],
                    ['name' => $permission, 'guard_name' => $guard]
                );
            }

            // Create or update roles for each guard
            $admin = Role::updateOrCreate(['name' => 'admin', 'guard_name' => $guard]);
            $employee = Role::updateOrCreate(['name' => 'employee', 'guard_name' => $guard]);

            // Sync permissions to admin role (all permissions for that guard)
            $admin->syncPermissions(Permission::where('guard_name', $guard)->get());

            // Employee role: subset of permissions
            $employeePermissions = [
                'view products',
                'create products',
                'update products',
                'view categories',
            ];

            $employee->syncPermissions(
                Permission::whereIn('name', $employeePermissions)
                          ->where('guard_name', $guard)
                          ->get()
            );
        }
    }
}
