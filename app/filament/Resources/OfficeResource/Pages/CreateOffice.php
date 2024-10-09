<?php

namespace App\Filament\Resources\OfficeResource\Pages;

use App\Filament\Resources\OfficeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOffice extends CreateRecord
{
    protected static string $resource = OfficeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Remove DeleteAction as it is not applicable here
            // Actions\DeleteAction::make(),
        ];
    }

    protected function getViewData(): array
    {
        return [
            'script' => $this->getLocationScript(),
        ];
    }

    private function getLocationScript(): string
    {
        return <<<EOT
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function(position) {
                            const latitude = position.coords.latitude;
                            const longitude = position.coords.longitude;

                            // Update the latitude and longitude fields
                            document.querySelector('input[name="latitude"]').value = latitude;
                            document.querySelector('input[name="longitude"]')..value = longitude;

                            // Optionally, update the Leaflet map here
                            // Example: updateMap(latitude, longitude);
                        });
                    } else {
                        alert("Geolocation is not supported by this browser.");
                    }
                });
            </script>
        EOT;
    }
}
