<?php

namespace App\Filament\Resources\CutikaryawanResource\Pages;

use App\Filament\Resources\CutikaryawanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCutikaryawans extends ListRecords
{
    protected static string $resource = CutikaryawanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
