<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles
        $roleChild = Role::create(['name' => 'child']);
        $roleParent = Role::create(['name' => 'parent']);
        $roleAdmin = Role::create(['name' => 'admin']);

        // create a demo admin user
        $adminUser = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);
        $adminUser->assignRole($roleAdmin);

        // create a demo parent user
        $parentUser = User::factory()->create([
            'name' => 'Test Parent',
            'email' => 'parent@example.com',
        ]);
        $parentUser->assignRole($roleParent);

        // create a demo child user
        $childUser = User::factory()->create([
            'name' => 'Test Child',
            'email' => 'child@example.com',
        ]);
        $childUser->assignRole($roleChild);
    }
}