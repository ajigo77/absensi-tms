<?php

namespace App\Providers\Filament;

use App\Filament\Auth\CustomLogin;
use App\Filament\Resources\IzinkaryawanResource;
use App\Filament\Resources\CutiTahunanResource;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationItem;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(CustomLogin::class) // Perbaiki di sini
            ->colors([
                'danger' => Color::Red,
                'gray' => Color::Zinc,
                'info' => Color::Blue,
                'primary' => Color::Red,
                'success' => Color::Green,
                'warning' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                return $builder
                    ->item(
                        NavigationItem::make('Dashboard')
                            ->icon('heroicon-o-home')
                            ->url(route('filament.admin.pages.dashboard'))
                    )
                    ->group('Attendance Management', [
                        NavigationItem::make('Office')
                            ->icon('heroicon-o-building-office')
                            ->url(route('filament.admin.resources.offices.index')),
                        NavigationItem::make('Permissions')
                            ->icon('heroicon-o-key')
                            ->url(route('filament.admin.resources.permissions.index')),
                        NavigationItem::make('Shift')
                            ->icon('heroicon-o-clock')
                            ->url(route('filament.admin.resources.shifts.index')),
                        NavigationItem::make('Users')
                            ->icon('heroicon-o-users')
                            ->url(route('filament.admin.resources.users.index')),
                    ])
                    ->group('Attendance Management', [
                        NavigationItem::make('Schedule')
                            ->icon('heroicon-o-calendar')
                            ->url(route('filament.admin.resources.schedules.index')),
                        NavigationItem::make('Attendance')
                            ->icon('heroicon-o-clipboard-document-list')
                            ->url(route('filament.admin.resources.attendances.index')),
                    ])
                    ->group('Permission Management', [
                        NavigationItem::make('Employee Permission')
                            ->icon('heroicon-o-document-check')
                            ->url(IzinkaryawanResource::getUrl()),
                        NavigationItem::make('Annual Leave')
                            ->icon('heroicon-o-document-check')
                            ->url(CutiTahunanResource::getUrl()),
                    ]);
            });
    }
}
