<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttendanceResource\Pages;
use App\Models\Attendance; // Pastikan Attendance diimpor dengan benar
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\DateFilter; 
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\Filter;

class AttendanceResource extends Resource
{
    protected static ?string $model = Attendance::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Your form fields here
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.member.nama')->label('Nama'), // Ensure this is correct
                Tables\Columns\TextColumn::make('shift.name')->label('Shift'),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status') // Display Status
                    ->badge() // Use badge for status
                    ->formatStateUsing(fn ($state) => match (strtolower(trim($state))) { // Normalize the status
                        'masuk on time' => 'Tepat Waktu',
                        'terlambat' => 'Terlambat',
                        'ijin' => 'Izin', // Update to match database
                        'sakit' => 'Sakit',
                        'cuti' => 'Cuti',
                        default => 'Tidak Diketahui',
                    })
                    ->color(fn ($state) => match (strtolower(trim($state))) { // Normalize the status for color
                        'masuk on time' => 'success', // Green
                        'terlambat' => 'danger', // Red
                        'ijin' => 'warning', // Orange
                        'sakit' => 'info', // Blue
                        'cuti' => 'primary', // Purple
                        default => 'secondary', // Gray
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Waktu Absen')
                    ->formatStateUsing(fn ($state) => $state->format('H:i:s')),
                Tables\Columns\TextColumn::make('type')->label('Tipe Absensi'),
                TextColumn::make('foto')
                    ->badge()
                    ->label('Foto') // Display Photo
                    ->formatStateUsing(fn ($state) => 
                        '<a href="' . $state . '" target="_blank" rel="noopener noreferrer" style="color: white;">Lihat Foto</a>' // Create clickable link
                    )
                    ->html(), // Enable HTML rendering
                TextColumn::make('lattitude')
                    ->badge() // Use badge for location
                    ->label('Lihat Lokasi') // Display Location
                    ->formatStateUsing(fn ($state, $record) => 
                        '<a href="https://www.google.com/maps?q=' . $record->lattitude . ',' . $record->longtitude . '" target="_blank" rel="noopener noreferrer" style="color: white;">Lihat Lokasi</a>' // Create clickable link
                    )
                    ->html(), // Enable HTML rendering
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'masuk on time' => 'Tepat Waktu',
                        'terlambat' => 'Terlambat',
                    ])
                    ->placeholder('Pilih Status'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
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
