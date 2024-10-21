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
                Forms\Components\DatePicker::make('tanggal_cuti')
                    ->required(),
                Forms\Components\Textarea::make('alasan')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\Select::make('approved')
                    ->options([
                        'menunggu' => 'Menunggu Persetujuan',
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
                Tables\Columns\TextColumn::make('tanggal_cuti')->label('Tanggal Cuti')->date(),
                Tables\Columns\TextColumn::make('alasan')->label('Alasan'),
                Tables\Columns\BadgeColumn::make('approved')
                    ->label('Status Persetujuan')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        '0' => 'Menunggu Persetujuan', // Handle status 0
                        'disetujui' => 'Sudah Disetujui',
                        'ditolak' => 'Ditolak',
                        default => 'Tidak Diketahui',
                    })
                    ->colors([
                        '0' => 'warning', // Yellow for status 0
                        'menunggu' => 'warning', // Yellow
                        'disetujui' => 'success', // Green
                        'ditolak' => 'danger', // Red
                        'default' => 'secondary', // Gray for unknown status
                    ]),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('approved')
                    ->label('Status Persetujuan')
                    ->options([
                        '0' => 'Menunggu Persetujuan', // Keep this option
                        'disetujui' => 'Sudah Disetujui',
                        'ditolak' => 'Ditolak',
                    ])
                    ->default('0'), // Prioritize the 'menunggu' status
            ])
            ->actions([
                Tables\Actions\Action::make('approve') // Action for approval
                    ->action(function ($record) {
                        $record->update(['approved' => 'disetujui']); // Update to 'disetujui'
                        // Optionally, add a notification here
                    }),
                Tables\Actions\Action::make('reject') // Action for rejection
                    ->action(function ($record) {
                        $record->update(['approved' => 'ditolak']); // Update to 'ditolak'
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
            'index' => Pages\ListCutikaryawans::route('/'),
            'create' => Pages\CreateCutikaryawan::route('/create'),
            'edit' => Pages\EditCutikaryawan::route('/{record}/edit'), // Jika Anda masih memerlukan halaman edit
        ];
    }
}
