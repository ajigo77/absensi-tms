<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShiftResource\Pages;
use App\Models\Shift;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table; // Add this line
use Illuminate\Database\Eloquent\Builder;

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
                    ->maxLength(255),
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\Select::make('start_time.hour')
                            ->options(self::getHourOptions())
                            ->required()
                            ->label('Start Hour'),
                        Forms\Components\Select::make('start_time.ampm')
                            ->options([
                                'AM' => 'AM',
                                'PM' => 'PM',
                            ])
                            ->required()
                            ->label('Start AM/PM'),
                    ]),
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\Select::make('end_time.hour')
                            ->options(self::getHourOptions())
                            ->required()
                            ->label('End Hour'),
                        Forms\Components\Select::make('end_time.ampm')
                            ->options([
                                'AM' => 'AM',
                                'PM' => 'PM',
                            ])
                            ->required()
                            ->label('End AM/PM'),
                    ]),
            ]);
    }

    private static function getHourOptions(): array
    {
        return array_combine(
            range(1, 12),
            array_map(fn($hour) => sprintf('%02d', $hour), range(1, 12))
        );
    }

    public static function table(Table $table): Table // Update this line
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('start_time')
                    ->dateTime('h:i A')
                    ->label('Start time'),
                Tables\Columns\TextColumn::make('end_time')
                    ->dateTime('h:i A')
                    ->label('End time'),
            ])
            ->filters([
                //
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
            //
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
