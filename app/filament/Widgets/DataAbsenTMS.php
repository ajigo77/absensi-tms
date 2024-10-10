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

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Absen::query()
                    ->whereDate('created_at', Carbon::today()) // Filter to show only today's data
            )
            ->columns([
                TextColumn::make('user_id')->label('User ID'), // Display User ID
                TextColumn::make('type')->label('Tipe Absensi'), // Display Attendance Type
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
                    ->url(fn ($record) => route('absen.show', $record->id_absen)) // Define the URL to the detail page
                    ->icon('heroicon-o-eye') // Optional: Add an icon
                    ->color('primary'), // Optional: Set the color
            ])
            ->filters([
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from')
                            ->label('Created from') // Label for start date
                            ->placeholder('dd/mm/yyyy'), // Placeholder for clarity
                        DatePicker::make('created_until')
                            ->label('Created until') // Label for end date
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
            ], layout: FiltersLayout::AboveContentCollapsible) // Set filters layout to above content and collapsible
            ->bulkActions([
                // Define your bulk actions here
            ]);
    }
}
