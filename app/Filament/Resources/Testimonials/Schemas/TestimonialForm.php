<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
            FileUpload::make('image')
            ->image()
            ->directory('testimonials')
            ->disk('public')
            ->visibility('public')
            ->columnSpanFull(),

        TextInput::make('name')->required(),
        TextInput::make('designation'),
        TextInput::make('company'),

        Textarea::make('message')
            ->required()
            ->columnSpanFull(),

        Select::make('rating')
            ->options([1,2,3,4,5])
            ->default(5),

        Toggle::make('is_active')->default(false),
            ]);
    }
}
