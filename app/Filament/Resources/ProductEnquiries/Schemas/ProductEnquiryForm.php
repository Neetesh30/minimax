<?php

namespace App\Filament\Resources\ProductEnquiries\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductEnquiryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 TextInput::make('product_path')
                ->label('Product Path')
                ->disabled(), // show in admin but not editable

                TextInput::make('product_name')->disabled(),
                TextInput::make('company_name'),
                TextInput::make('email')->email(),
                TextInput::make('mobile_no'),
                TextInput::make('state'),
                TextInput::make('city'),
                Textarea::make('message')->rows(3),
            ]);
    }
}
