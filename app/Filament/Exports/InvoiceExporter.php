<?php

namespace App\Filament\Exports;

use App\Models\Invoice;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class InvoiceExporter extends Exporter
{
    protected static ?string $model = Invoice::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('invoice_number'),
            ExportColumn::make('invoice_date'),
            ExportColumn::make('customer_account'),
            ExportColumn::make('customer'),
            ExportColumn::make('delivery_city'),
            ExportColumn::make('pin_code'),
            ExportColumn::make('product'),
            ExportColumn::make('code'),
            ExportColumn::make('batch_no'),
            ExportColumn::make('sr_no'),
            ExportColumn::make('CCOM_IS_FOR_CUSTOMER'),
            ExportColumn::make('CDOM_IS_FOR_DEALER'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your invoice export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
