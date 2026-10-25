<?php

namespace App\Filament\Imports;

use App\Models\Invoice;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Number;

class InvoiceImporter extends Importer
{
    protected static ?string $model = Invoice::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('invoice_number')
                ->rules(['max:255']),
            ImportColumn::make('invoice_date')
                ->rules(['max:20']),
            ImportColumn::make('customer_account')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('customer')
                ->rules(['max:255']),
            ImportColumn::make('delivery_city')
                ->rules(['max:255']),
            ImportColumn::make('pin_code')
                ->rules(['max:255']),
            ImportColumn::make('product')
                ->rules(['max:500']),
            ImportColumn::make('code')
                ->rules(['max:255']),
            ImportColumn::make('batch_no')
                ->rules(['max:15']),
            ImportColumn::make('sr_no')
                ->rules(['max:15']),
            ImportColumn::make('CCOM_IS_FOR_CUSTOMER'),
            ImportColumn::make('CDOM_IS_FOR_DEALER'),
        ];
    }

    public function resolveRecord(): Invoice
    {
        return new Invoice();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your invoice import has completed and ' . Number::format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
