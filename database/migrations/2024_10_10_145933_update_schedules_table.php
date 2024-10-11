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
        Schema::table('schedules', function (Blueprint $table) {
            // Rename 'name' column to 'user_id' and change its type
            $table->renameColumn('name', 'user_id');
            $table->unsignedBigInteger('user_id')->change();
            
            // Add foreign key constraint
            $table->foreign('user_id')->references('id')->on('users');
            
            // Drop the 'email' column if it exists
            if (Schema::hasColumn('schedules', 'email')) {
                $table->dropColumn('email');
            }
            
            // Ensure 'office' column exists
            if (!Schema::hasColumn('schedules', 'office')) {
                $table->string('office');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            // Remove foreign key constraint
            $table->dropForeign(['user_id']);
            
            // Rename 'user_id' back to 'name' and change its type
            $table->renameColumn('user_id', 'name');
            $table->string('name')->change();
            
            // Add back the 'email' column
            $table->string('email')->nullable();
            
            // Drop 'office' column if it was added in the up() method
            if (Schema::hasColumn('schedules', 'office')) {
                $table->dropColumn('office');
            }
        });
    }
};
