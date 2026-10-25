<?php

namespace App\Filament\Resources\Invoices\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class InvoiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('invoice_number')
                                            ->required(),
                TextInput::make('invoice_number')
                                            ->required(),
                DatePicker::make('invoice_date')
                                            ->native()
                                            ->format('d/m/Y')
                                            ->required(),
                TextInput::make('customer_account')->required(),
                TextInput::make('customer')->required(),
                TextInput::make('delivery_city')->required(),
                TextInput::make('pin_code')->required(),
                Textarea::make('product')->required(),
                TextInput::make('code')->required(),
                TextInput::make('batch_no')->required(),
                TextInput::make('sr_no')->required(),
                TextInput::make('CCOM_IS_FOR_CUSTOMER')
                                            ->label('C-CDOM IS FOR CUSTOMER'),
                TextInput::make('C-DDOM_IS_FOR_DEALER')
                                            ->label('CDOM IS FOR DEALER'),

            ]);
    }
}
