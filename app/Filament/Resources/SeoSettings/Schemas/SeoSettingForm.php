<?php

namespace App\Filament\Resources\SeoSettings\Schemas;

use Filament\Schemas\Schema;

use App\Support\RouteList;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;

class SeoSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([


            section::make('Route')
            ->schema([
                  Select::make('route_name')
            ->label('Route')
            ->options(fn () => RouteList::seoRoutes())
            ->searchable()
            ->required()
            ->unique(ignoreRecord: true)
            ->helperText('Select a frontend route'),
            ])->columnSpanFull(),
                

            Section::make('SEO Meta')->schema([
            TextInput::make('title')->maxLength(70),
            Textarea::make('description')->maxLength(160),
           TextInput::make('keywords'),
        ])->columnSpanFull(),

        Section::make('Open Graph')->schema([
        TextInput::make('og_title'),
        Textarea::make('og_description'),
        FileUpload::make('og_image')
                ->image()
                ->directory('seo'),
        ])->columnSpanFull(),

        Toggle::make('noindex')
       ->label('No Index (Hide from Search Engines)')
    ]);
    }
}
