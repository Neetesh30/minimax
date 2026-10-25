<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;
use Filament\Forms\Form;
use App\Models\Product;
use App\Models\ProductCategory;
use Filament\Forms\Set;
use Filament\Schemas\Components\Utilities\Set as UtilitiesSet;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Str;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;

class ProductForm
{

    public static function configure(Schema $schema): Schema
    {

         // Fetch image files from storage/app/public/products/multiple
        $images = collect(Storage::disk('public')->files('products/multiple'))
            ->filter(fn($file) => in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
            ->mapWithKeys(function ($path) {
                $url = Storage::url($path); // Generates /storage/products/multiple/filename.jpg
                $filename = basename($path);
                return [
                    $path => "<img src='{$url}' alt='{$filename}' class='h-20 rounded shadow' />",
                ];
            })
            ->toArray();


        return $schema
            ->components([

       Tabs::make('Tabs')
         ->tabs([

            Tab::make('SEO')
            ->schema([
               
                Section::make('SEO')
                ->relationship('seo')
                ->schema([
                    TextInput::make('title'),
                    Textarea::make('description'),
                    TextInput::make('keywords'),
                    FileUpload::make('og_image')
                              ->image()
                              ->disk('public')
                              ->visibility('public')
                              ->openable()
                              ->downloadable(),
                    TextInput::make('canonical_url'),
                    Textarea::make('schema')->label('Schema JSON'),
                ])
            ]),

        Tab::make('Product Details')
            ->schema([
                 Section::make('Product Details')
                ->description('Add Your Product Details Here')
                ->schema([
                     TextInput::make('name')
            //   ->live(onBlur: true)
            //     ->afterStateUpdated(fn (UtilitiesSet $set, ?string $state) => $set('slug', Str::slug($state)))
                ->required()
                ->maxLength(255),
               

        TextInput::make('slug')
            ->unique(ignoreRecord: true)
            ->required(),

        Select::make('category_id')
            ->label('Category')
            ->options(ProductCategory::whereNull('parent_id')->pluck('name','id'))
            ->reactive()
            ->afterStateUpdated(fn (callable $set) => $set('subcategory_id', null))
            ->required(),

        Select::make('subcategory_id')
            ->label('Subcategory')
            ->options(fn (callable $get) =>
                ProductCategory::where('parent_id', $get('category_id'))->pluck('name','id')
            )
            ->reactive()
            ->afterStateUpdated(fn (callable $set) => $set('subsubcategory_id', null))
            ->nullable(),
        
        Select::make('subsubcategory_id')
            ->label('Sub-subcategory')
            ->options(fn (callable $get) =>
                ProductCategory::where('parent_id', $get('subcategory_id'))->pluck('name','id')
            )
            ->nullable(),

        TextInput::make('sku')->unique(ignoreRecord: true),
        TextInput::make('product_code'),
        TextInput::make('capacity'),

        DateTimePicker::make('expiry'),

        RichEditor::make('description')
                                    ->columnSpanFull(),

        Textarea::make('html_table')
                                    ->columnSpanFull(),

        RichEditor::make('footer_description')
                                    ->columnSpanFull(),

        FileUpload::make('image')
        ->disk('public')
        ->visibility('public')
        ->directory('products')
        ->image()
        ->preserveFilenames()   // prevents broken previews
        ->maxSize(2048)
        ->imageEditor()
        ->openable()
        ->downloadable()
        ->columnSpanFull(),

        CheckboxList::make('images')
        ->label('Select Images')
        ->options($images)
        ->allowHtml()
        ->columns(7)
        ->bulkToggleable()
        ->gridDirection('row')
        ->columnSpanFull(),


        TextInput::make('price')
            ->numeric()
            ->prefix('₹'),

                Toggle::make('status')
                    ->label('Active')
                    ->default(false),
                ])->columnSpanFull(),
            ]),
        
        Tab::make('Product FAQ')
            ->schema([
               
            Repeater::make('faqs')
            ->relationship()     // tells repeater to save into product_faqs
            ->schema([
                TextInput::make('question')->required(),
                Textarea::make('answer')->required(),
            ])
            ->columnSpanFull()
            ->defaultItems(1)
            ->addActionLabel('Add FAQ'),

            ]),

             Tab::make('Application Areas')
            ->schema([
               
             Repeater::make('application_areas')
                ->label('Application Areas')
                ->schema([
                    TextInput::make('title')
                    ->required()
                    ->placeholder('e.g. Petrol & Oil Burning'),
                ]),

            ])->columnSpan(1),


             Tab::make('Key Features')
            ->schema([
               
              Repeater::make('key_features')
                ->label('Key Features')
                ->schema([
                    Textarea::make('feature')
                         ->required()
                        ->rows(2)
                        ->placeholder('Enter feature text'),
                ]),


            ])->columnSpan(1),


             Tab::make('Product Badges')
            ->schema([
               
               Repeater::make('product_badges')
                ->label('Product Badges')
                ->schema([
                    FileUpload::make('image')
                        ->image()
                        ->disk('public')
                        ->visibility('public')
                        ->directory('product-badges')
                        ->preserveFilenames(),

                    TextInput::make('title')
                        ->placeholder('5-years warranty'),

                    TextInput::make('subtitle')
                        ->placeholder('optional'),
                ])


            ]),


        ])->columnSpanFull(),

            
        ]);


        
           
    }
}
