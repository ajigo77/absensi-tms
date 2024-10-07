<?php

namespace App\Filament\Resources\IzintahunanResource\Pages;

use App\Filament\Resources\IzintahunanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIzintahunans extends ListRecords
{
    protected static string $resource = IzintahunanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
