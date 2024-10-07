<?php

namespace App\Filament\Resources\IzintahunanResource\Pages;

use App\Filament\Resources\IzintahunanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIzintahunan extends EditRecord
{
    protected static string $resource = IzintahunanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
