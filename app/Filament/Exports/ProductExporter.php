<?php

namespace App\Filament\Exports;

use App\Models\Product;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class ProductExporter extends Exporter
{
    protected static ?string $model = Product::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('name'),
            ExportColumn::make('slug'),
            ExportColumn::make('category_id'),
            ExportColumn::make('subcategory_id'),
            ExportColumn::make('subsubcategory_id'),
            ExportColumn::make('sku')
                ->label('SKU'),
            ExportColumn::make('product_code'),
            ExportColumn::make('capacity'),
            ExportColumn::make('expiry'),
            ExportColumn::make('description'),
            ExportColumn::make('html_table'),
            ExportColumn::make('footer_description'),
            ExportColumn::make('status'),
            ExportColumn::make('price'),
            ExportColumn::make('image'),
            ExportColumn::make('images'),
            ExportColumn::make('selected_images'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your product export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
