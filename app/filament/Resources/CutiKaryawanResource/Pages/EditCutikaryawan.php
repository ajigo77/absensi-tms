<?php

namespace App\Filament\Resources\CutikaryawanResource\Pages;

use App\Filament\Resources\CutikaryawanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCutikaryawan extends EditRecord
{
    protected static string $resource = CutikaryawanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
