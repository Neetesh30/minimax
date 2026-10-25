<?php

namespace App\Providers\Filament;

use App\Models\Enquiry;
use Filament\Http\Middleware\Authenticate;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use ShuvroRoy\FilamentSpatieLaravelHealth\FilamentSpatieLaravelHealthPlugin;
use Stephenjude\FilamentBlog\BlogPlugin;
use Z3d0X\FilamentFabricator\FilamentFabricatorPlugin;
use MWGuerra\FileManager\FileManagerPlugin;
use MWGuerra\FileManager\Filament\Pages\FileManager;
use MWGuerra\FileManager\Filament\Pages\FileSystem;
use MWGuerra\FileManager\Filament\Pages\SchemaExample;
use MWGuerra\FileManager\Filament\Resources\FileSystemItemResource;
use Moataz01\FilamentNotificationSound\FilamentNotificationSoundPlugin;
use Xentixar\FilamentPushNotifications\PushNotification;

 
use Filament\View\PanelsRenderHook;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use ShuvroRoy\FilamentSpatieLaravelBackup\FilamentSpatieLaravelBackupPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->spa()
            ->passwordReset()
            ->emailVerification()
            ->databaseNotifications()
            ->colors([
                'primary' => Color::Orange,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
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
            ->plugins([
                FilamentShieldPlugin::make(),
                BlogPlugin::make(),
                FilamentSpatieLaravelBackupPlugin::make(),
                FilamentSpatieLaravelHealthPlugin::make(),
                FilamentFabricatorPlugin::make(),
                \BezhanSalleh\GoogleAnalytics\GoogleAnalyticsPlugin::make(),
                 \Biostate\FilamentMenuBuilder\FilamentMenuBuilderPlugin::make(),
                  // Register only specific components
                    FileManagerPlugin::make([
                        FileManager::class,              // Database mode - full CRUD file manager
                        // FileSystem::class,               // Storage mode - read-only file browser
                        // FileSystemItemResource::class,   // Resource for direct database table editing
                        // SchemaExample::class,            // Demo page showing embed components usage
                    ]),
                 FilamentNotificationSoundPlugin::make()
                ->soundPath('/sounds/custom-notification.mp3') // Custom sound path
                ->volume(1) // Volume (0.0 to 1.0)
                ->showAnimation(true) // Show animation on notification badge
                ->enabled(true), // Enable/disable the plugin
                    
                PushNotification::make(),
                ])
            
            ->viteTheme('resources/css/filament/admin/theme.css')
        
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
