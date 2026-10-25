<?php

namespace App\Filament\Resources\Videos\Schemas;
use App\Models\Video;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Schemas\Schema;

class VideoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 Forms\Components\TextInput::make('title')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('youtube_id')
                ->required()
                ->maxLength(50),
            Forms\Components\Textarea::make('description'),
            Forms\Components\TextInput::make('thumbnail')
                ->helperText('Optional. If empty, will auto-generate from YouTube.'),
            Forms\Components\Toggle::make('is_most_watched')
                ->label('Show in Most Watched'),
            Forms\Components\TextInput::make('order')
                ->numeric()
                ->default(0)
                ->label('Display Order'),
            ]);
    }
}
