<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IzinKaryawanResource\Pages;
use App\Filament\Resources\IzinKaryawanResource\RelationManagers;
use App\Models\IzinKaryawan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IzinKaryawanResource extends Resource
{
    protected static ?string $model = IzinKaryawan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Define your form fields here
                Forms\Components\TextInput::make('employee_name')->required(),
                Forms\Components\TextInput::make('reason')->required(),
                Forms\Components\DatePicker::make('start_date')->required(),
                Forms\Components\DatePicker::make('end_date')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Define your table columns here
                Tables\Columns\TextColumn::make('employee_name'),
                Tables\Columns\TextColumn::make('reason'),
                Tables\Columns\DateColumn::make('start_date'),
                Tables\Columns\DateColumn::make('end_date'),
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
            'index' => Pages\ListIzinKaryawans::route('/'),
            'create' => Pages\CreateIzinKaryawan::route('/create'),
            'edit' => Pages\EditIzinKaryawan::route('/{record}/edit'),
        ];
    }
}
