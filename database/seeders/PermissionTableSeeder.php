<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'role list',
            'role create',
            'role edit',
            'role delete',
            'user create',
            'user list',
            'user edit',
            'user delete',
            'lecturer create',
            'lecturer list',
            'lecturer edit',
            'lecturer delete',
            'lecturer import',
         ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
