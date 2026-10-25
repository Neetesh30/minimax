<?php

namespace App\Filament\Resources\Verifications\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class VerificationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('batch_number')
                    ->required()
                    ->maxLength(255),
                TextInput::make('serial_number')
                    ->required()
                    ->maxLength(255),
                TextInput::make('organisation')
                    ->required()
                    ->maxLength(255),
                TextInput::make('mobile')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
            ]);
    }
}
