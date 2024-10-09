<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttendanceResource\Pages;
use App\Models\Attendance;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AttendanceResource extends Resource
{
    protected static ?string $model = Attendance::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Form fields can be added here if needed
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_absen')->label('ID Absen'),
                Tables\Columns\TextColumn::make('created_at')->label('Tanggal')->dateTime(),
                Tables\Columns\TextColumn::make('user_id')->label('Pegawai'),
                Tables\Columns\TextColumn::make('status')->label('Status'), // Pastikan kolom status ditambahkan
                Tables\Columns\TextColumn::make('shift_id')->label('Waktu Datang'), // Pastikan kolom waktu datang ditambahkan
                Tables\Columns\TextColumn::make('shift_id')->label('Waktu Pulang'), // Jika ada kolom untuk waktu pulang
            ])
            ->filters([
                // Add filters if needed
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAttendances::route('/'),
            'create' => Pages\CreateAttendance::route('/create'),
            'edit' => Pages\EditAttendance::route('/{record}/edit'),
        ];
    }
}
