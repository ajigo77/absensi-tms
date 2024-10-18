<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttendanceResource\Pages;
use App\Models\Attendance; // Pastikan Attendance diimpor dengan benar
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
<<<<<<< Updated upstream
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\DateFilter; 
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\Filter;
=======
use Illuminate\Support\Facades\Log;
use App\Filament\Actions\Exports\ExportAction;
use App\Filament\Exports\AttendanceExporter;
use Filament\Tables\Actions\ExportAction as FilamentExportAction;
use Filament\Notifications\Notification;
use Illuminate\Support\Str;
>>>>>>> Stashed changes

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
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama'),
                Tables\Columns\TextColumn::make('shift.name')
                    ->label('Shift'),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Waktu Pulang')
                    ->dateTime('H:i:s'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Waktu Datang')
                    ->dateTime('H:i:s'),
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
