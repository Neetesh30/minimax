<?php

namespace App\Filament\Resources\ProductEnquiries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Table;

class ProductEnquiriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('product_path')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('product_name')->searchable(),
                TextColumn::make('company_name')->sortable(),
                TextColumn::make('email'),
                TextColumn::make('mobile_no'),
                TextColumn::make('state'),
                TextColumn::make('city'),
                TextColumn::make('created_at')
                    ->dateTime()   // formats as datetime
                    ->toggleable(isToggledHiddenByDefault: true),
            ])->defaultSort('id', 'desc')
            ->filters([
                //
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
