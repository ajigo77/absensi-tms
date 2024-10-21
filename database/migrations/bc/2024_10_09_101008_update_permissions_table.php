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
            // Check if 'description' column exists and drop it if it does
            if (Schema::hasColumn('permissions', 'description')) {
                $table->dropColumn('description');
            }
            
            // Modify existing columns if needed
            $table->string('name')->change();
            $table->string('role')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permissions', function (Blueprint $table) {
            // Add back the description column if needed
            $table->text('description')->nullable();
        });
    }
};
