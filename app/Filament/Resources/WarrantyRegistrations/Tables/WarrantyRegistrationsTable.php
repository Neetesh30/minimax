<?php

namespace App\Filament\Resources\WarrantyRegistrations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Table;

class WarrantyRegistrationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('type'),
                TextColumn::make('organisation_name')
                    ->searchable(),
                TextColumn::make('gunnebo_invoice_no')
                    ->searchable(),
                TextColumn::make('dealer_invoice_no')
                    ->searchable(),
                TextColumn::make('end_customer_name')
                    ->searchable(),
                TextColumn::make('batch_no')
                    ->searchable(),
                TextColumn::make('serial_from')
                    ->searchable(),
                TextColumn::make('serial_to')
                    ->searchable(),
                TextColumn::make('mobile')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
               TextColumn::make('created_at')
                    ->dateTime()   // formats as datetime
                    ->toggleable(isToggledHiddenByDefault: true),

               TextColumn::make('updated_at')
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
