<?php

namespace App\Filament\Resources\PermissionResource\Pages;

use App\Filament\Resources\PermissionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPermissions extends ListRecords
{
    protected static string $resource = PermissionResource::class;

    protected function getHeaderActions(): array
    {
        $actions = [];

        if (auth()->user()->hasPermission('create_permissions')) {
            $actions[] = Actions\CreateAction::make();
        }

        return $actions;
    }
}
