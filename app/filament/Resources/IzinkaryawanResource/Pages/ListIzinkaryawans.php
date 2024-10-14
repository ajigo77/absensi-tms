<?php

namespace App\Filament\Resources\IzinkaryawanResource\Pages;

use App\Filament\Resources\IzinkaryawanResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions; // Use the correct namespace for actions

class ListIzinkaryawans extends ListRecords
{
    protected static string $resource = IzinkaryawanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(), // Keep the create action
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
            'approved' => 'Status Persetujuan',
            'signature' => 'Tanda Tangan',
            // ... tambahkan kolom lain jika perlu
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Actions\Action::make('view') // Action to view details
                ->action(function ($record) {
                    // Logic to view details, e.g., redirect to a detail page
                    return redirect()->route('izinkaryawan.show', $record->id);
                }),
            Actions\Action::make('approve') // Action for approval
                ->action(function ($record) {
                    $record->update(['approved' => 'disetujui']);
                    // Optionally, you can add a notification here
                }),
        ];
    }
}
