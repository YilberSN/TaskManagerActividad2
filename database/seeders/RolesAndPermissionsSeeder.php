<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        
        Permission::create(['name' => 'create tasks']);
        Permission::create(['name' => 'edit tasks']); 
        Permission::create(['name' => 'delete tasks']);

        $admin = Role::create(['name' => 'admin']); 
        $admin->givePermissionTo(Permission::all());

        $editor = Role::create(['name' => 'editor']); 
        $editor->givePermissionTo(['create tasks', 'edit tasks']);

        $user = Role::create(['name' => 'user']);

    }
}
