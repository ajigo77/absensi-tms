<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DataAbsensiOverview extends BaseWidget

{
    protected function getStats(): array
    {
        return [
            Stat::make('Karyawan masuk', '19')
                ->description('15 increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 15, 20, 43, 60])
                ->color('success'),
            Stat::make('Karyawan Terlambat', '4')
                ->description('21.05% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->chart([4      , 1, 2, 6, 14, 21, 33])
                ->color('danger'),
            Stat::make('Karyawan Lembur', '6')
                ->description('43% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
        ];
        
    }
}
