<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Text;

class PrivacyPolicy extends PageBlock
{
    protected static string $name = 'privacy-policy';

    public static function defineBlock(Block $block): Block
    {
        return $block
            ->schema([
                 TextInput::make('title')
                ->required()->
                maxLength(255),
                RichEditor::make('description')
                ->required()
                ->columnSpanFull(),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
