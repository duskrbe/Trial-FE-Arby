<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\Widgets;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;

use App\Filament\Resources\AkreditasiResource;
use App\Filament\Resources\AlumniResource; // Asumsi nama Resource Alumni
use App\Filament\Resources\BannerProdiResource; // Asumsi nama Resource Banner Prodi
use App\Filament\Resources\DosenResource;
use App\Filament\Resources\FasilitasResource; // Asumsi nama Resource Fasilitas
use App\Filament\Resources\KurikulumResource; // Asumsi nama Resource Kurikulum
use App\Filament\Resources\LogsResource;
use App\Filament\Resources\MataKuliahResource;
use App\Filament\Resources\MitraResource; // Asumsi nama Resource Mitra
use App\Filament\Resources\PenelitianResource; // Asumsi nama Resource Penelitian
use App\Filament\Resources\PrestasiResource; // Asumsi nama Resource Prestasi
use App\Filament\Resources\ProgramStudiResource;
use App\Filament\Resources\ProspekKarirResource;
use App\Filament\Resources\SpotlightResource;
use App\Filament\Resources\UserResource;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
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
            ->databaseNotifications()
            ->authMiddleware([
                Authenticate::class,
            ])
            ->renderHook(PanelsRenderHook::SIDEBAR_NAV_START, fn () => view('filament.components.navigation-filter'))
            ->navigation(function(NavigationBuilder $builder): NavigationBuilder {
                return $builder
                    ->items([
                        NavigationItem::make('Dashboard')
                        ->icon('heroicon-o-home')
                        ->url(Pages\Dashboard::getUrl()),
                        NavigationItem::make('Manajemen User')
                        ->icon('heroicon-o-users')
                        ->url(UserResource::getUrl())
                        ->visible(auth()->user()->hasRole('super_admin')),
                    ])
                    ->groups([
                        NavigationGroup::make('Manajemen Program Studi')
                            ->items([
                                // Resources yang terkait langsung dengan Program Studi
                                ...ProgramStudiResource::getNavigationItems(),
                                ...BannerProdiResource::getNavigationItems(),
                                ...AkreditasiResource::getNavigationItems(),
                                ...KurikulumResource::getNavigationItems(),
                                ...MataKuliahResource::getNavigationItems(),
                                ...DosenResource::getNavigationItems(),
                                ...ProspekKarirResource::getNavigationItems(),
                                ...SpotlightResource::getNavigationItems(),
                            ]),
                        NavigationGroup::make('Data Pendukung Kampus')
                            ->items([
                                // Resources data pendukung
                                ...LogsResource::getNavigationItems(),
                                ...AlumniResource::getNavigationItems(),
                                ...FasilitasResource::getNavigationItems(),
                                ...MitraResource::getNavigationItems(),
                                ...PenelitianResource::getNavigationItems(),
                                ...PrestasiResource::getNavigationItems(),
                            ]),
                        ]);

                        

            });
            
    }
}
