<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CutiTahunanResource\Pages;
use App\Filament\Resources\CutiTahunanResource\RelationManagers;
use App\Models\CutiTahunan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CutiTahunanResource extends Resource
{
    protected static ?string $model = CutiTahunan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Define your form fields here
                Forms\Components\TextInput::make('employee_name')->required(),
                Forms\Components\DatePicker::make('leave_date')->required(),
                Forms\Components\TextInput::make('reason')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Define your table columns here
                Tables\Columns\TextColumn::make('employee_name'),
                Tables\Columns\DateColumn::make('leave_date'),
                Tables\Columns\TextColumn::make('reason'),
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
            'index' => Pages\ListCutiTahunans::route('/'),
            'create' => Pages\CreateCutiTahunan::route('/create'),
            'edit' => Pages\EditCutiTahunan::route('/{record}/edit'),
        ];
    }
}
