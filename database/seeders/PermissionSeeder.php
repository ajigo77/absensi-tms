<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminPermissions = [
            'view_dashboard',
            'view_reports',
            // Add other permissions as needed
        ];

        $managerPermissions = [
            'view_dashboard',
            'view_reports',
            'approve_requests',
            'reject_requests',
            // Add other permissions as needed
        ];

        // Create permissions
        Permission::create([
            'name' => 'Admin',
            'role' => Permission::ROLE_ADMIN,
            'permissions' => json_encode($adminPermissions),
        ]);

        Permission::create([
            'name' => 'Manager',
            'role' => Permission::ROLE_MANAGER,
            'permissions' => json_encode($managerPermissions),
        ]);
    }
}
