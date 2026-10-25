<?php

namespace App\Filament\Resources\ResourcePdfs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ResourcePdfForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('resource_category_id')
                ->relationship('category', 'name')
                ->required(),

                TextInput::make('title')
                ->required(),

                FileUpload::make('file')
                ->disk('public')
                ->preserveFilenames()
                ->directory('resources/pdfs')
                ->acceptedFileTypes(['application/pdf'])
                ->required(),

                TextInput::make('order')
                ->numeric()
                ->default(0),

                Toggle::make('is_active')
                ->default(true),

            ]);
    }
}
