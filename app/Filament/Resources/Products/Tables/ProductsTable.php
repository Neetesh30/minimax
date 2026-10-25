<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\BooleanColumn;
use App\Filament\Exports\ProductExporter;
use Filament\Actions\ExportAction;
use App\Filament\Imports\ProductImporter;
use Filament\Actions\ImportAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Storage;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                 ImageColumn::make('image')->square()
                        ->disk('public')
                        ->visibility('public'),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('sku'),
                  TextColumn::make('price')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => '₹' . number_format($state, 2)),
             
                // Tables\Columns\TextColumn::make('category.name')->label('Category'),
                // Tables\Columns\TextColumn::make('subcategory.name')->label('Subcategory'),
                TextColumn::make('expiry')
                    ->date(),  // auto-formats as date

                BooleanColumn::make('status'),
               TextColumn::make('created_at')
                    ->dateTime()   // formats as datetime
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
             ->headerActions([
                ExportAction::make()
                ->exporter(ProductExporter::class),
                 ImportAction::make()
                ->importer(ProductImporter::class)
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
