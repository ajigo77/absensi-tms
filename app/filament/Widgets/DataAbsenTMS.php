<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Absen; // Pastikan model Absen diimpor
use Filament\Tables\Columns\TextColumn; // Ganti dengan TextColumn

class DataAbsenTMS extends BaseWidget

{
    protected static ?string $heading = 'Data Absensi TMS';
    protected static ?int $sort = 4;
    protected int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Absen::query() // Mengambil data dari model Absen
            )
            ->columns([
                TextColumn::make('user_id')->label('User ID'), // Menampilkan User ID
                TextColumn::make('type')->label('Type'), // Menampilkan Tipe Absensi
                TextColumn::make('status')->label('Status'), // Menampilkan Status
                TextColumn::make('created_at')->label('Tanggal Masuk'), // Menampilkan Tanggal Masuk
                // ... tambahkan kolom lain sesuai kebutuhan
            ]);
    }
}
