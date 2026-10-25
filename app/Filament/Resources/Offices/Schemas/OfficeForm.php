<?php

namespace App\Filament\Resources\Offices\Schemas;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Schemas\Schema;

class OfficeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                TextInput::make('company_name')
                                           
                    ->required()
                    ->maxLength(255),
                Textarea::make('address')
                        ->rows(2)
                        ->required()
                        ->columnSpanFull(),
                TextInput::make('phone')
                                            ->tel()
                                            ->required()
                                            ->maxLength(255),
                TextInput::make('email')
                                            ->email()
                                            ->required()
                                            ->maxLength(255),
            ]);
    }
}
