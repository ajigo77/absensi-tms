<?php

namespace App\Filament\Resources\AttendanceResource\Pages;

use App\Filament\Resources\AttendanceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAttendances extends ListRecords
{
    protected static string $resource = AttendanceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->label('New attendance'),
            Actions\Action::make('export')
                ->label('Export attendances')
                ->action(fn () => $this->export()),
        ];
    }

    protected function export()
    {
        // Implement your export logic here
    }
}
