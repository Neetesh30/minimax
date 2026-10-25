<?php
namespace App\Filament\Resources\Industries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;

class IndustryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

              TextInput::make('name'),
            
               TextInput::make('slug')->required(), 

            FileUpload::make('image')
                ->image()
                ->imageEditor()
                ->disk('public')
                ->visibility('public')
                ->directory('industries')
                ->required()
                ->preserveFilenames()
                ->openable()
                ->downloadable()
                ->columnSpanFull(),

                RichEditor::make('intro')
                ->label('Introduction')
                ->columnSpanFull(),

            Repeater::make('key_risks')
                ->label('Key Fire Risks')
                ->schema([
                    TextInput::make('risk')
                        ->required()
                        ->label('Risk'),
                ])
                ->columnSpanFull(),

            Repeater::make('solutions')
                ->label('Recommended Solutions')
                ->schema([
            TextInput::make('solution')
                ->required()
                ->label('Solution'),
             ])->columnSpanFull(),

            RichEditor::make('why_choose_us')
                ->label('Why Minimax?')
                
                ->columnSpanFull(),

            
            // RichEditor::make('description')
            // ->columnSpanFull()
            // ->required(),

            Toggle::make('is_active')
                ->default(false),
            ]);
    }
}
