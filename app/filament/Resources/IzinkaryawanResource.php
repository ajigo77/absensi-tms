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
use Filament\Tables\Enums\FiltersLayout;


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
                Tables\Columns\TextColumn::make('nama_karyawan')->label('Nama Karyawan'), // Moved to the top
                Tables\Columns\TextColumn::make('jenis_izin')->label('Jenis Izin'),
                Tables\Columns\TextColumn::make('divisi')->label('Divisi'),
                Tables\Columns\TextColumn::make('jabatan')->label('Jabatan'),
                Tables\Columns\TextColumn::make('tanggal_izin')->label('Tanggal Izin'),
                Tables\Columns\TextColumn::make('jam_pulang_awal')->label('Jam Pulang Awal'),
                Tables\Columns\TextColumn::make('alasan')->label('Alasan'),
                Tables\Columns\BadgeColumn::make('approved')
                    ->label('Status Persetujuan')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        '0' => 'Menunggu Persetujuan',
                        'menunggu' => 'Menunggu Persetujuan',
                        'disetujui' => 'Sudah Disetujuhi',
                        'ditolak' => 'Ditolak',
                        default => 'Tidak Diketahui',
                    })
                    ->colors([
                        '0' => 'warning', // Yellow for status 0
                        'menunggu' => 'warning', // Yellow for waiting
                        'disetujui' => 'success', // Green for approved
                        'ditolak' => 'danger', // Red for rejected
                        'default' => 'secondary', // Gray for unknown status
                    ]),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('approved')
                    ->label('Status Persetujuan')
                    ->options([
                        '0' => 'Menunggu Persetujuan', // Status 0
                        'disetujui' => 'Sudah Disetujuhi',
                        'ditolak' => 'Ditolak',
                    ])
                    ->default('0'), // Prioritaskan yang belum di-approve
            ])
            ->actions([
                // Fitur view telah dihapus sesuai instruksi
                Tables\Actions\Action::make('approve') // Action for approval
                    ->action(function ($record) {
                        $record->update(['approved' => 'disetujui']);
                        // Optionally, add a notification here
                    }),
                Tables\Actions\Action::make('reject') // Action for rejection
                    ->action(function ($record) {
                        $record->update(['approved' => 'ditolak']);
                        // Optionally, add a notification here
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
            'index' => Pages\ListIzinkaryawans::route('/'),
            'create' => Pages\CreateIzinkaryawan::route('/create'),
            'edit' => Pages\EditIzinkaryawan::route('/{record}/edit'), // You can keep this if you still need an edit page
        ];
    }
}
