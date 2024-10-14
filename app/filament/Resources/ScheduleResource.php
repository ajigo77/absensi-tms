<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScheduleResource\Pages;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Office;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table as FilamentTable;
use Filament\Forms\Components\Select;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        $hours = array_map(function ($hour) {
            $hour = str_pad($hour, 2, '0', STR_PAD_LEFT);
            return [
                "$hour:00 AM" => "$hour:00 AM",
                "$hour:30 AM" => "$hour:30 AM",
                "$hour:00 PM" => "$hour:00 PM",
                "$hour:30 PM" => "$hour:30 PM",
            ];
        }, range(1, 12));

        $timeOptions = array_merge(...$hours);

        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Name')
                    ->options(User::pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('office')
                    ->label('Office')
                    ->options(Office::pluck('name', 'name'))
                    ->searchable()
                    ->required(),
                Forms\Components\Toggle::make('wfa')
                    ->label('Work From Anywhere'),
                Select::make('shift_start')
                    ->label('Shift Start')
                    ->options($timeOptions)
                    ->required(),
                Select::make('shift_end')
                    ->label('Shift End')
                    ->options($timeOptions)
                    ->required(),
            ]);
    }

    public static function table(FilamentTable $table): FilamentTable
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('office')
                    ->searchable(),
                Tables\Columns\BooleanColumn::make('wfa')
                    ->label('WFA'),
                Tables\Columns\TextColumn::make('shift_start'),
                Tables\Columns\TextColumn::make('shift_end'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListSchedules::route('/'),
            'create' => Pages\CreateSchedule::route('/create'),
            'edit' => Pages\EditSchedule::route('/{record}/edit'),
        ];
    }
}
