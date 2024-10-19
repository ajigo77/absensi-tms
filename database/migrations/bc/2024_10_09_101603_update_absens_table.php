<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAbsensTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('absens', function (Blueprint $table) {
            // Menambahkan kolom jika belum ada
            if (!Schema::hasColumn('absens', 'type')) {
                $table->enum('type', ['masuk', 'tidak masuk'])->after('user_id');
            }

            if (!Schema::hasColumn('absens', 'shift_id')) {
                $table->integer('shift_id')->after('type');
            }

            if (!Schema::hasColumn('absens', 'foto')) {
                $table->string('foto')->nullable()->after('shift_id');
            }

            if (!Schema::hasColumn('absens', 'lattitude')) {
                $table->decimal('lattitude', 10, 8)->nullable()->after('foto');
            }

            if (!Schema::hasColumn('absens', 'longtitude')) {
                $table->decimal('longtitude', 11, 8)->nullable()->after('lattitude');
            }

            if (!Schema::hasColumn('absens', 'status')) {
                $table->enum('status', ['masuk on time', 'terlambat'])->after('longitude');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('absens', function (Blueprint $table) {
            // Menghapus kolom jika perlu
            $table->dropColumn(['type', 'shift_id', 'foto', 'lattitude', 'longtitude', 'status']);
        });
    }
}
