<?php

namespace App\Filament\Resources\Banners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Route;


class BannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
            Select::make('route_name')
                ->unique(ignoreRecord: true)
                ->label('Page')
                ->options(self::getRouteOptions())
                ->searchable()
                ->required(),

            FileUpload::make('image')
                ->image()
                ->directory('banners')
                ->disk('public')
                ->preserveFilenames()
                ->openable()
                ->downloadable()
                ->visibility('public')
                ->required(),
            ]);
    }

    protected static function getRouteOptions(): array
    {
        return collect(Route::getRoutes())
            ->filter(fn ($route) =>
                $route->getName() &&
                ! str_starts_with($route->getName(), 'filament.')
            )
            ->mapWithKeys(fn ($route) => [
                $route->getName() => str($route->getName())->replace('.', ' ')->title(),
            ])
            ->toArray();
    }
}
