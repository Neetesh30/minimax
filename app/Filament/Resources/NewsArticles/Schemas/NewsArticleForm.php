<?php

namespace App\Filament\Resources\NewsArticles\Schemas;


use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;


class NewsArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('title')
                ->required()
                ->maxLength(255)
                ->live(debounce: 300)
                ->helperText(fn (?string $state): string => mb_strlen($state ?? '') . ' / 255 characters')
                ->afterStateUpdatedJs(<<<'JS'
                    const slugify = (value) => String(value ?? '')
                        .normalize('NFKD')
                        .replace(/[\u0300-\u036f]/g, '')
                        .toLowerCase()
                        .replace(/&/g, ' and ')
                        .replace(/[^a-z0-9]+/g, '-')
                        .replace(/^-+|-+$/g, '')
                        .slice(0, 255)
                        .replace(/-+$/g, '');

                    const currentSlug = $get('slug') ?? '';

                    if (!currentSlug || currentSlug === slugify($old)) {
                        $set('slug', slugify($state));
                    }
                    JS),

            TextInput::make('sub_title')
                ->label('Subtitle')
                ->maxLength(255),

            TextInput::make('slug')
                ->required()
                ->maxLength(255)
                ->unique(ignoreRecord: true)
                ->regex('/^[a-z0-9]+(?:-[a-z0-9]+)*$/')
                ->helperText('Use lowercase letters, numbers, and hyphens.'),

            TextInput::make('article_category')
                ->label('Category')
                ->maxLength(255),

            TextInput::make('article_link')
                ->label('External article URL')
                ->url()
                ->maxLength(255),

            TextInput::make('author')
                ->maxLength(255),

            Textarea::make('summary')
                ->maxLength(500)
                ->live(debounce: 300)
                ->helperText(fn (?string $state): string => mb_strlen($state ?? '') . ' / 500 characters')
                ->rows(3)
                ->columnSpanFull(),

            RichEditor::make('body')
                ->label('Article content')
                ->required(fn (Get $get): bool => blank($get('article_link')))
                ->toolbarButtons([
                    'bold',
                    'italic',
                    'underline',
                    'link',
                    'h2',
                    'h3',
                    'bulletList',
                    'orderedList',
                    'blockquote',
                    'undo',
                    'redo',
                ])
                ->helperText('Required unless an external article URL is provided.')
                ->columnSpanFull(),

            FileUpload::make('cover_image')
                ->image()
                ->disk('public')
                ->visibility('public')
                ->directory('news')
                ->acceptedFileTypes([
                    'image/jpeg',
                    'image/png',
                    'image/webp',
                ])
                ->maxSize(5120)
                ->helperText('JPG, PNG, or WebP. Maximum 5 MB.'),

            TextInput::make('cover_image_alt')
                ->label('Cover image alt text')
                ->maxLength(255)
                ->required(fn (Get $get): bool => filled($get('cover_image')))
                ->helperText('Describe the image for people using screen readers.'),

            Select::make('status')
                ->options([
                    'draft' => 'Draft',
                    'published' => 'Published',
                ])
                ->default('draft')
                ->required()
                ->live(),

            DateTimePicker::make('published_at')
                ->label('Publication date')
                ->seconds(false)
                ->required(fn (Get $get): bool => $get('status') === 'published')
                ->helperText(
                    'Required for published articles. Timezone: ' .
                    config('app.timezone')
                ),

            TextInput::make('meta_title')
                ->label('SEO title')
                ->maxLength(60)
                ->live(debounce: 300)
                ->helperText(fn (?string $state): string => mb_strlen($state ?? '') . ' / 60 characters'),

            Textarea::make('meta_description')
                ->label('SEO description')
                ->maxLength(160)
                ->live(debounce: 300)
                ->helperText(fn (?string $state): string => mb_strlen($state ?? '') . ' / 160 characters')
                ->rows(3)
                ->columnSpanFull(),
        ]);
    }
}
