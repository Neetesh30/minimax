<?php

namespace App\Filament\Resources\ProductCategories\Schemas;

use Filament\Schemas\Schema;
use App\Models\ProductCategory;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Schemas\Components\Utilities\Set as UtilitiesSet;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 TextInput::make('name')
                ->live(onBlur: true)
                ->afterStateUpdated(fn (UtilitiesSet $set, ?string $state) => $set('slug', Str::slug($state)))
                ->required()
                ->maxLength(255),

            TextInput::make('slug')
                ->unique(ignoreRecord: true)
                ->required(),

            Select::make('parent_id')
                ->label('Parent Category')
                ->relationship('parent', 'name')
                ->live()
                ->preload()
                ->searchable()
                ->nullable(),

            FileUpload::make('image')
            ->disk('public')
            ->visibility('public')
            ->image()
            ->directory('categories')
            ->preserveFilenames()
            ->imageEditor()
            ->openable()
            ->downloadable(),

            Forms\Components\Toggle::make('status')
                ->label('Active')
                ->default(true),
            ]);
        
    }
}
