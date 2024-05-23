<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_develop = Role::create([
            'name' => 'develop'
        ]);

        $role_admin = Role::create([
            'name' => 'admin'
        ]);

        $role_client = Role::create([
            'name' => 'client'
        ]);
    }
}
