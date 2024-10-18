<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('cutikaryawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan'); // Nama Karyawan
            $table->string('divisi'); // Divisi
            $table->string('jabatan'); // Jabatan
            $table->date('tanggal_cuti'); // Tanggal Cuti
            $table->text('alasan'); // Alasan       
            $table->boolean('approved')->default(false); // Status Persetujuan
            $table->timestamps();
        });
    }

    /**
     * Membalikkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('cutikaryawans');
    }
};
