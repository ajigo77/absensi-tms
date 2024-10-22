<?php

namespace App\Filament\Widgets;

use App\Models\Absen; // Import the Absen model
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DataAbsensiOverview extends BaseWidget
{
    protected function getStats(): array
    {
        // Fetch data from the model for today
        $stats = Absen::getStats(); // Call getStats() directly from the model

        return [
            // Karyawan Masuk
            Stat::make('Karyawan Masuk', $stats['masuk'] ?? 0) // Fallback to 0 if 'masuk' is not set
                ->description('Total Karyawan Masuk Hari Ini')
                ->color('success'),
            // Karyawan Keluar
            Stat::make('Karyawan Keluar', $stats['keluar'] ?? 0) // Fallback to 0 if 'keluar' is not set
                ->description('Total Karyawan Keluar Hari Ini')
                ->color('info'),
            // Karyawan On Time
            Stat::make('Karyawan On Time', $stats['on_time'] ?? 0) // Fallback to 0 if 'on_time' is not set
                ->description('Total Karyawan On Time Hari Ini')
                ->color('success'),
            // Karyawan Terlambat
            Stat::make('Karyawan Terlambat', $stats['terlambat'] ?? 0) // Fallback to 0 if 'terlambat' is not set
                ->description('Total Karyawan Terlambat Hari Ini')
                ->color('danger'),
        ];
    }
}
