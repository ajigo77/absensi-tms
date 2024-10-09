<?php

namespace App\Filament\Resources\IzinkaryawanResource\Pages;

use App\Filament\Resources\IzinkaryawanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Textarea;

class CreateIzinkaryawan extends CreateRecord
{
    protected static string $resource = IzinkaryawanResource::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_karyawan')->required(),
                TextInput::make('jenis_izin')->required(),
                TextInput::make('divisi')->required(),
                TextInput::make('jabatan')->required(),
                DatePicker::make('tanggal_izin')->required(),
                TimePicker::make('jam_pulang_awal')->required(),
                Textarea::make('alasan')->required(),
                Textarea::make('signature')->required(), // Tanda tangan
            ]);
    }
}
