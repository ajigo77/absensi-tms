<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('permissions', function (Blueprint $table) {
            // Add the permissions column if it doesn't exist
            if (!Schema::hasColumn('permissions', 'permissions')) {
                $table->json('permissions')->nullable(); // Add a JSON column for permissions
            }
        });

        // Optionally, you can seed the permissions here
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

        // Create or update permissions
        \App\Models\Permission::updateOrCreate(
            ['role' => \App\Models\Permission::ROLE_ADMIN],
            ['name' => 'Admin', 'permissions' => json_encode($adminPermissions)]
        );

        \App\Models\Permission::updateOrCreate(
            ['role' => \App\Models\Permission::ROLE_MANAGER],
            ['name' => 'Manager', 'permissions' => json_encode($managerPermissions)]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permissions', function (Blueprint $table) {
            // Optionally drop the permissions column if needed
            $table->dropColumn('permissions');
        });
    }
};
