<?php

namespace App\Filament\Imports;

use App\Models\Product;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Number;

class ProductImporter extends Importer
{
    protected static ?string $model = Product::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('name')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('slug')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('category_id')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('subcategory_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('subsubcategory_id')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('sku')
                ->label('SKU')
                ->rules(['max:255']),
            ImportColumn::make('product_code')
                ->rules(['max:255']),
            ImportColumn::make('capacity')
                ->rules(['max:255']),
            ImportColumn::make('expiry')
                ->rules(['date']),
            ImportColumn::make('description'),
            ImportColumn::make('html_table'),
            ImportColumn::make('footer_description'),
            ImportColumn::make('status')
                ->requiredMapping()
                ->boolean()
                ->rules(['required', 'boolean']),
            ImportColumn::make('price')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('image')
                ->rules(['max:255']),
            ImportColumn::make('images'),
            ImportColumn::make('selected_images'),
        ];
    }

    public function resolveRecord(): Product
    {
        return new Product();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your product import has completed and ' . Number::format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
