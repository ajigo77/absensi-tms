<?php

namespace App\Filament\Resources\IzinKaryawanResource\Pages;

use App\Filament\Resources\IzinKaryawanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIzinKaryawans extends ListRecords
{
    protected static string $resource = IzinKaryawanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
