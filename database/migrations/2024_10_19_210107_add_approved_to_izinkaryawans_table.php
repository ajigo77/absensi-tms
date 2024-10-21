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
        Schema::table('izinkaryawans', function (Blueprint $table) {
            $table->string('approved')->default('0'); // Add the approved column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('izinkaryawans', function (Blueprint $table) {
            $table->dropColumn('approved'); // Remove the approved column
        });
    }
};
