<?php

namespace App\Filament\Resources\IzinkaryawanResource\Pages;

use App\Filament\Resources\IzinkaryawanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;


class ListIzinkaryawans extends ListRecords
{
    protected static string $resource = IzinkaryawanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableColumns(): array
    {
        return [
            'jenis_izin' => 'Jenis Izin',
            'nama_karyawan' => 'Nama Karyawan',
            'divisi' => 'Divisi',
            'jabatan' => 'Jabatan',
            'tanggal_izin' => 'Tanggal Izin',
            'jam_pulang_awal' => 'Jam Pulang Awal',
            'alasan' => 'Alasan',
            'approved' => 'Status Persetujuan', // Kolom untuk status persetujuan
            'signature' => 'Tanda Tangan', // Kolom untuk tanda tangan
            // ... tambahkan kolom lain jika perlu
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Actions\EditAction::make(), // Aksi untuk mengedit
            Actions\Action::make('approve') // Aksi untuk persetujuan
                ->action(function ($record) {
                    $record->update(['approved' => true]);
                }),
            Actions\Action::make('sign') // Aksi untuk tanda tangan
                ->action(function ($record) {
                    // Logika untuk menambahkan tanda tangan
                }),
        ];
    }
}
