<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IzinkaryawanResource\Pages;
use App\Filament\Resources\IzinkaryawanResource\RelationManagers;
use App\Models\Izinkaryawan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\SoftDeletingScope;

class IzinkaryawanResource extends Resource
{
    protected static ?string $model = Izinkaryawan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('jenis_izin')->label('Jenis Izin'),
                Tables\Columns\TextColumn::make('nama_karyawan')->label('Nama Karyawan'),
                Tables\Columns\TextColumn::make('divisi')->label('Divisi'),
                Tables\Columns\TextColumn::make('jabatan')->label('Jabatan'),
                Tables\Columns\TextColumn::make('tanggal_izin')->label('Tanggal Izin'),
                Tables\Columns\TextColumn::make('jam_pulang_awal')->label('Jam Pulang Awal'),
                Tables\Columns\TextColumn::make('alasan')->label('Alasan'),
                Tables\Columns\BadgeColumn::make('approved')
                    ->label('Status Persetujuan')
                    ->getStateUsing(fn ($record) => match ($record->approved) {
                        'menunggu' => 'Menunggu Persetujuan',
                        'disetujui' => 'Sudah Disetujui',
                        'ditolak' => 'Ditolak',
                        default => 'Tidak Diketahui',
                    })
                    ->colors([
                        'menunggu' => 'warning', // Warna kuning
                        'disetujui' => 'success', // Warna hijau
                        'ditolak' => 'danger', // Warna merah
                    ]),
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
            'index' => Pages\ListIzinkaryawans::route('/'),
            'create' => Pages\CreateIzinkaryawan::route('/create'),
            'edit' => Pages\EditIzinkaryawan::route('/{record}/edit'),
        ];
    }
}
