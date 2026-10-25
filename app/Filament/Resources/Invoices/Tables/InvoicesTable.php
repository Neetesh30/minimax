<?php

namespace App\Filament\Resources\Invoices\Tables;

use App\Filament\Exports\InvoiceExporter;
use App\Filament\Imports\InvoiceImporter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ImportAction;
use Filament\Actions\ExportAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InvoicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('invoice_number')->searchable(),
            TextColumn::make('invoice_date')->date(),
            TextColumn::make('customer_account'),
            TextColumn::make('customer')->searchable(),
            TextColumn::make('delivery_city'),
            TextColumn::make('product')->limit(20),
            TextColumn::make('code'),
            TextColumn::make('batch_no'),
            TextColumn::make('pin_code'),
            TextColumn::make('sr_no'),
            TextColumn::make('CCOM_IS_FOR_CUSTOMER'),
            TextColumn::make('C-DDOM_IS_FOR_DEALER'),
            TextColumn::make('created_at')->dateTime()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])

             ->headerActions([
                ExportAction::make()
                ->exporter(InvoiceExporter::class),

                 ImportAction::make()
                ->importer(InvoiceImporter::class)
             ])

            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
