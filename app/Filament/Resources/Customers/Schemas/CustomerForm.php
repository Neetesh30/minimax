<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('pincode')->required(),
                TextInput::make('password')
                    ->password()
                    ->required(),
                    
                Toggle::make('is_approved')
                    ->label('Approved?')
                    ->helperText('If enabled, customer can log in.')
                    ->default(false),
                
                TextInput::make('customer_account')
                    ->default(null),
            ]);
    }
}
