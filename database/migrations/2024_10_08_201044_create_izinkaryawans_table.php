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
        Schema::create('izinkaryawans', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_izin'); // Menambahkan kolom jenis izin
            $table->string('nama_karyawan'); // Menambahkan kolom nama karyawan
            $table->string('divisi'); // Menambahkan kolom divisi
            $table->string('jabatan'); // Menambahkan kolom jabatan
            $table->date('tanggal_izin'); // Menambahkan kolom tanggal izin
            $table->time('jam_pulang_awal'); // Menambahkan kolom jam pulang awal
            $table->text('alasan'); // Menambahkan kolom alasan
            $table->boolean('approved')->default(false); // Kolom untuk status approval
            $table->string('signature')->nullable(); // Kolom untuk tanda tangan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('izinkaryawans');
    }
};
