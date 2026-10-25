<?php

namespace App\Filament\Resources\Timelines\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TimelineForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 TextInput::make('title')
                    ->required(),
                 FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->visibility('public')
                    ->directory('timelines'),
                Textarea::make('description')
                    ->rows(4)
                    ->required(),
                TextInput::make('order')
                    ->numeric()
                    ->default(0),
                
                Toggle::make('is_active')
                    ->default(false),


            ]);
    }
}
