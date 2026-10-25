<?php

namespace App\Filament\Resources\WarrantyRegistrations\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class WarrantyRegistrationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 TextInput::make('type')
                    ->required(),
                TextInput::make('organisation_name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('gunnebo_invoice_no')
                    ->maxLength(255)
                    ->default(null),
                TextInput::make('dealer_invoice_no')
                    ->maxLength(255)
                    ->default(null),
                TextInput::make('end_customer_name')
                    ->maxLength(255)
                    ->default(null),
                TextInput::make('batch_no')
                    ->required()
                    ->maxLength(255),
                TextInput::make('serial_from')
                    ->required()
                    ->maxLength(255),
                TextInput::make('serial_to')
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
