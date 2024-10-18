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
use Filament\Tables\Actions\Action; // Import Action

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
                Absen::with(['shift', 'user']) // Eager load the shift and user relationships
            )
            ->columns([
                TextColumn::make('user.name') // Change this line to fetch the user's name
                    ->label('Nama'), // Update the label
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
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'on time' => 'Tepat Waktu',
                        'terlambat' => 'Terlambat',
                        'Izin' => 'Izin',
                        'Sakit' => 'Sakit',
                        'Cuti' => 'Cuti',
                        default => 'Tidak Diketahui',
                    })
                    ->color(fn ($state) => match ($state) {
                        'on time' => 'success', // Green
                        'terlambat' => 'danger', // Red
                        'Izin' => 'warning', // Orange
                        'Sakit' => 'info', // Blue
                        'Cuti' => 'primary', // Purple
                        default => 'secondary', // Gray
                    }),
                TextColumn::make('created_at')->label('Tanggal Masuk'), // Display Entry Date
            ])
            ->actions([
                Action::make('view') // Define the view action
                    ->label('View') // Label for the action
                    ->action(fn ($record) => [
                        'modal' => [
                            'title' => 'Detail Absensi', // Title of the modal
                            'content' => view('filament.widgets.absen-detail', ['record' => $record]), // Use a view to display the record details
                        ],
                    ])
                    ->icon('heroicon-o-eye') // Optional: Add an icon
                    ->color('primary'), // Optional: Set the color
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
