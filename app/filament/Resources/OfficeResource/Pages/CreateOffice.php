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
            // Menghapus DeleteAction karena tidak relevan di sini
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

                            // Memperbarui field latitude dan longitude
                            document.querySelector('input[name="latitude"]').value = latitude;
                            document.querySelector('input[name="longitude"]').value = longitude;

                            // Opsional, perbarui peta Leaflet di sini
                            // Contoh: updateMap(latitude, longitude);
                        });
                    } else {
                        alert("Geolocation tidak didukung oleh browser ini.");
                    }
                });
            </script>
        EOT;
    }
}
