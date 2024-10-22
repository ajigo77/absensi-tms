<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CutikaryawanResource\Pages;
use App\Models\Cutikaryawan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CutikaryawanResource extends Resource
{
    protected static ?string $model = Cutikaryawan::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_karyawan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('divisi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jabatan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('dari_tanggal')
                    ->required(),
                Forms\Components\DatePicker::make('sampai_tanggal')
                    ->required(),
                Forms\Components\Textarea::make('alasan')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\Select::make('approved')
                    ->options([
                        'pending' => 'Menunggu Persetujuan',
                        'disetujui' => 'Sudah Disetujui',
                        'ditolak' => 'Ditolak',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_karyawan')->label('Nama Karyawan'),
                Tables\Columns\TextColumn::make('divisi')->label('Divisi'),
                Tables\Columns\TextColumn::make('jabatan')->label('Jabatan'),
                Tables\Columns\TextColumn::make('dari_tanggal')->label('Dari Tanggal')->date(),
                Tables\Columns\TextColumn::make('sampai_tanggal')->label('Sampai Tanggal')->date(),
                Tables\Columns\TextColumn::make('alasan')->label('Alasan'),
                Tables\Columns\BadgeColumn::make('approved')
                    ->label('Status Persetujuan')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'pending' => 'Menunggu Persetujuan',
                        'disetujui' => 'Sudah Disetujui',
                        'ditolak' => 'Ditolak',
                        default => 'Tidak Diketahui',
                    })
                    ->colors([
                        'pending' => 'warning',
                        'disetujui' => 'success',
                        'ditolak' => 'danger',
                        'default' => 'secondary',
                    ]),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('approved')
                    ->label('Status Persetujuan')
                    ->options([
                        'pending' => 'Menunggu Persetujuan',
                        'disetujui' => 'Sudah Disetujui',
                        'ditolak' => 'Ditolak',
                    ])
                    ->default('pending'),
            ])
            ->actions([
                Tables\Actions\Action::make('approve')
                    ->action(function ($record) {
                        $record->update(['approved' => 'disetujui']);
                    }),
                Tables\Actions\Action::make('reject')
                    ->action(function ($record) {
                        $record->update(['approved' => 'ditolak']);
                    }),
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
            'index' => Pages\ListCutikaryawans::route('/'),
            'create' => Pages\CreateCutikaryawan::route('/create'),
            'edit' => Pages\EditCutikaryawan::route('/{record}/edit'),
        ];
    }
}
