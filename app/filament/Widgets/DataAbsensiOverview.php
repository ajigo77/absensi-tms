<?php

namespace App\Filament\Widgets;

use App\Models\Absen; // Tambahkan ini
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DataAbsensiOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $stats = Absen::getStats(); // Ambil data dari model

        return [
            Stat::make('Karyawan masuk', $stats['masuk'])
                ->description('15 increase') // Anda bisa menghitung ini secara dinamis
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 15, 20, 43, 60]) // Anda bisa mengganti ini dengan data real-time
                ->color('success'),
            Stat::make('Karyawan Terlambat', $stats['terlambat'])
                ->description('21.05% increase') // Hitung ini secara dinamis
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->chart([4, 1, 2, 6, 14, 21, 33]) // Ganti dengan data real-time
                ->color('danger'),
            Stat::make('Karyawan Lembur', $stats['lembur'])
                ->description('43% increase') // Hitung ini secara dinamis
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17]) // Ganti dengan data real-time
                ->color('success'),
            Stat::make('Karyawan Tidak masuk', $stats['tidak_masuk'])
                ->description('33% increase') // Hitung ini secara dinamis
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17]) // Ganti dengan data real-time
                ->color('danger'),
        ];
    }
}
