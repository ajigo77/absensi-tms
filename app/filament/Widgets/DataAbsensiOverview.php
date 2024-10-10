<?php

namespace App\Filament\Widgets;

use App\Models\Absen; // Import the Absen model
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon; // Import Carbon for date handling

class DataAbsensiOverview extends BaseWidget
{
    protected function getStats(): array
    {
        // Fetch data from the model for today
        $stats = Absen::getStats(); // Call getStats() directly from the model

        return [
            Stat::make('Karyawan Masuk', $stats['masuk'])
                ->description('Total Karyawan Masuk Hari Ini')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Karyawan Terlambat', $stats['terlambat'])
                ->description('Total Karyawan Terlambat Hari Ini')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
            Stat::make('Karyawan Lembur', $stats['lembur'])
                ->description('Total Karyawan Lembur Hari Ini')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Karyawan Tidak Masuk', $stats['tidak_masuk'])
                ->description('Total Karyawan Tidak Masuk Hari Ini')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
        ];
    }
}
