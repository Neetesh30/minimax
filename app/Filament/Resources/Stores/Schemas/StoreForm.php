<?php

namespace App\Filament\Resources\Stores\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class StoreForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                  TextInput::make('title')
                        ->required(),

                    TextInput::make('subtitle')
                        ->nullable(),

                       Textarea::make('address')
                        ->required()
                        ->columnSpanFull(),

                    TextInput::make('city')
                        ->required(),

                    TextInput::make('pincode')
                        ->required(),

                    TextInput::make('phone')
                        ->tel(),

                    TextInput::make('email')
                        ->email(),

                    Grid::make(2)->schema([
                        TextInput::make('latitude')
                            ->numeric()
                            ->required(),

                        TextInput::make('longitude')
                            ->numeric()
                            ->required(),
                    ]),

                    Toggle::make('is_active')
                        ->default(false),
            ]);
    }
}
