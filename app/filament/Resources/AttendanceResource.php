<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttendanceResource\Pages;
use App\Models\Attendance;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Log;
use App\Filament\Actions\Exports\ExportAction;
use App\Filament\Exports\AttendanceExporter;
use Filament\Tables\Actions\ExportAction as FilamentExportAction;

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
        // Use the query builder directly without calling get()
        return $table
            ->query(Attendance::with(['shift', 'user'])) // Eager load relationships
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Nama'), // Fetch the user's name
                Tables\Columns\TextColumn::make('created_at')->label('Tanggal')->dateTime(),
                Tables\Columns\TextColumn::make('shift.name')->label('Shift'), // Displaying the shift name
                Tables\Columns\TextColumn::make('status')->label('Status'),
                Tables\Columns\TextColumn::make('arrival_time')->label('Waktu Datang'),
                Tables\Columns\TextColumn::make('departure_time')->label('Waktu Pulang'),
            ])
            ->filters([
                // Add filters if needed
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                FilamentExportAction::make()->exporter(AttendanceExporter::class),
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
