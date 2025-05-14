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

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(
                ['name' => $permission, 'guard_name' => 'web'],
                ['name' => $permission]
            );
        }

        $admin = Role::updateOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $employee = Role::updateOrCreate(['name' => 'employee', 'guard_name' => 'web']);

        $admin->syncPermissions(Permission::all());

        $employeePermissions = [
            'view products',
            'create products',
            'update products',
            'view categories',
        ];

        $employee->syncPermissions(
            Permission::whereIn('name', $employeePermissions)->get()
        );
    }
}
