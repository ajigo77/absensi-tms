<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user'); // Pastikan ini ada
            $table->foreignId('member_id')->constrained('members', 'id_member');
            $table->string('password');
            $table->foreignId('jabatan_id')->constrained('jabatan', 'id_jabatan');
            $table->foreignId('divisi_id')->constrained('divisi', 'id_divisi');
            $table->enum('status', ['active', 'inactive']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
