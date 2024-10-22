<?php

namespace App\Filament\Resources\IzinkaryawanResource\Pages;

use App\Filament\Resources\IzinkaryawanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Form;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\View;
use Filament\Forms\Components\Text;

class EditIzinkaryawan extends EditRecord
{
    protected static string $resource = IzinkaryawanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Text::make('nama_karyawan')->label('Nama Karyawan')->disabled(),
                Text::make('divisi')->label('Divisi')->disabled(),
                Text::make('jabatan')->label('Jabatan')->disabled(),
                Text::make('dari_tanggal')->label('Dari Tanggal')->disabled(), // Updated from 'tanggal_izin' to 'dari_tanggal'
                Text::make('sampai_tanggal')->label('Sampai Tanggal')->disabled(), // Added 'sampai_tanggal'
                Text::make('jam_pulang_awal')->label('Jam Pulang Awal')->disabled(),
                Text::make('alasan')->label('Alasan')->disabled(),            ]);
    }

    protected function afterSave(): void
    {
        $this->record->approved = 'disetujui'; // Atau sesuai dengan logika Anda
        $this->record->save();
    }
}
