<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class DataAbsenTMSChart extends ChartWidget
{
    protected static ?string $heading = 'Data Absensi TMS';
    protected static ?int $sort = 4;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Data Absensi TMS',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
