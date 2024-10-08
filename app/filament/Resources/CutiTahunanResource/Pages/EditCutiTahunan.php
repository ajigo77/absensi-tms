<?php

namespace App\Filament\Resources\CutiTahunanResource\Pages;

use App\Filament\Resources\CutiTahunanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCutiTahunan extends EditRecord
{
    protected static string $resource = CutiTahunanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
