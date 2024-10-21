<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Absen; // Ensure the Absen model is imported
use Filament\Tables\Columns\TextColumn; // Import TextColumn
use Carbon\Carbon; // Import Carbon for date handling
use Filament\Tables\Enums\FiltersLayout; // Import FiltersLayout
use Filament\Tables\Filters\Filter; // Import Filter
use Filament\Forms\Components\DatePicker; // Import DatePicker
use Illuminate\Database\Eloquent\Builder; // Import Builder

class DataAbsenTMS extends BaseWidget
{
    protected static ?string $heading = 'Data Absensi TMS';
    protected static ?int $sort = 4;
    protected int | string | array $columnSpan = 'full';

    private function getAddressFromCoordinates($latitude, $longitude)
    {
        $apiKey = env('GOOGLE_MAPS_API_KEY'); // Ambil API Key dari .env
        $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng={$latitude},{$longitude}&key={$apiKey}";

        $response = @file_get_contents($url); // Suppress errors with @
        
        if ($response === false) {
            return 'Error retrieving address'; // Handle error
        }

        $data = json_decode($response, true);

        if (isset($data['status']) && $data['status'] === 'OK') {
            return $data['results'][0]['formatted_address'] ?? 'Alamat tidak ditemukan';
        }

        return 'Alamat tidak ditemukan';
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Absen::with(['shift', 'user.member']) // Load user and member relationships
            )
            ->columns([
                TextColumn::make('user.member.nama') // Accessing nama through user and member
                    ->label('Nama'), // Label untuk kolom
                TextColumn::make('type')->label('Tipe Absensi'), // Display Attendance Type
                TextColumn::make('shift.name')
                    ->label('Shift') // Ubah label menjadi 'Shift'
                    ->badge(), // Gunakan badge untuk shift
                TextColumn::make('foto')
                    ->badge()
                    ->label('Foto') // Display Photo
                    ->formatStateUsing(fn ($state) => 
                        '<a href="' . $state . '" target="_blank" rel="noopener noreferrer" style="color: white;">Lihat Foto</a>' // Create clickable link
                    )
                    ->html(), // Enable HTML rendering
                TextColumn::make('lattitude')
                    ->badge() // Use badge for location
                    ->label('Lihat Lokasi') // Display Location
                    ->formatStateUsing(fn ($state, $record) => 
                        '<a href="https://www.google.com/maps?q=' . $record->lattitude . ',' . $record->longtitude . '" target="_blank" rel="noopener noreferrer" style="color: white;">Lihat Lokasi</a>' // Create clickable link
                    )
                    ->html(), // Enable HTML rendering
                TextColumn::make('status')
                    ->label('Status') // Display Status
                    ->badge() // Use badge for status
                    ->formatStateUsing(fn ($state) => match (strtolower(trim($state))) { // Normalize the status
                        'masuk on time' => 'Tepat Waktu',
                        'terlambat' => 'Terlambat',
                        'ijin' => 'Izin', // Update to match database
                        'sakit' => 'Sakit',
                        'cuti' => 'Cuti',
                        default => 'Tidak Diketahui',
                    })
                    ->color(fn ($state) => match (strtolower(trim($state))) { // Normalize the status for color
                        'masuk on time' => 'success', // Green
                        'terlambat' => 'danger', // Red
                        'ijin' => 'warning', // Orange
                        'sakit' => 'info', // Blue
                        'cuti' => 'primary', // Purple
                        default => 'secondary', // Gray
                    }),
                TextColumn::make('created_at')
                    ->label('Tanggal Masuk') // Display Entry Date
                    ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->translatedFormat('d F Y')) // Format date without time
                    ->sortable(), // Optional: make it sortable
            ])
            ->filters([
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from')
                            ->label('Dari Tanggal') // Label for start date
                            ->placeholder('dd/mm/yyyy'), // Placeholder for clarity
                        DatePicker::make('created_until')
                            ->label('Sampai Tanggal') // Label for end date
                            ->default(now()), // Default to current date
                    ]) 
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ])
            ->bulkActions([
                // Define your bulk actions here
            ]);
    }
}
