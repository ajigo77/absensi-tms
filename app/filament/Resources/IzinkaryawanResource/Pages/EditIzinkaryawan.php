<?php

namespace App\Filament\Resources\IzinkaryawanResource\Pages;

use App\Filament\Resources\IzinkaryawanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIzinkaryawan extends EditRecord
{
    protected static string $resource = IzinkaryawanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
