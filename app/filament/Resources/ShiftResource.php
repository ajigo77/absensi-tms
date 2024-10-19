<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShiftResource\Pages;
use App\Models\Shift;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;

class ShiftResource extends Resource
{
    protected static ?string $model = Shift::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Shift Name'),
                Forms\Components\DateTimePicker::make('start_time') // Use DateTimePicker instead
                    ->required()
                    ->label('Start Time'),
                Forms\Components\DateTimePicker::make('end_time') // Use DateTimePicker instead
                    ->required()
                    ->label('End Time'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID'),
                Tables\Columns\TextColumn::make('name')->label('Shift Name'),
                Tables\Columns\TextColumn::make('start_time')
                    ->label('Start Time')
                    ->formatStateUsing(fn ($state) => $state->format('H:i')), // Show only hour
                Tables\Columns\TextColumn::make('end_time')
                    ->label('End Time')
                    ->formatStateUsing(fn ($state) => $state->format('H:i')), // Show only hour
            ])
            ->filters([
                // Add any filters if needed
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Define any relationships if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListShifts::route('/'),
            'create' => Pages\CreateShift::route('/create'),
            'edit' => Pages\EditShift::route('/{record}/edit'),
        ];
    }
}
