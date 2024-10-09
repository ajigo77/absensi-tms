<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PermissionResource\Pages;
use App\Models\Permission;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PermissionResource extends Resource
{
    protected static ?string $model = Permission::class;

    protected static ?string $navigationIcon = 'heroicon-o-key';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('name')
                    ->label('User')
                    ->options(User::pluck('name', 'name'))
                    ->required(),
                Forms\Components\Select::make('role')
                    ->required()
                    ->options([
                        'Superadmin' => 'Superadmin',
                        'Admin' => 'Admin',
                        'Karyawan' => 'Karyawan',
                    ])
                    ->reactive()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('description', self::getDescriptionForRole($state))),
                Forms\Components\Textarea::make('description')
                    ->disabled()
                    ->dehydrated(false)
                    ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('User'),
                Tables\Columns\TextColumn::make('role'),
                Tables\Columns\TextColumn::make('description'),
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
            'index' => Pages\ListPermissions::route('/'),
            'create' => Pages\CreatePermission::route('/create'),
            'edit' => Pages\EditPermission::route('/{record}/edit'),
        ];
    }

    // Add this method to the class
    public static function getDescriptionForRole($role): string
    {
        return match ($role) {
            'Superadmin' => 'Can do everything, including adding a signature',
            'Admin' => 'Can edit and view',
            'Karyawan' => 'Can only view',
            default => '',
        };
    }
}
