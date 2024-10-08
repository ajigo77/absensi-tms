<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;
use App\Filament\Resources\IzinKaryawanResource;
use App\Filament\Resources\CutiTahunanResource;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Filament::registerResources([
            IzinKaryawanResource::class,
            CutiTahunanResource::class,
        ]);
    }
}
