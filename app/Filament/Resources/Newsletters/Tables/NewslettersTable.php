<?php

namespace App\Filament\Resources\Newsletters\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Table;

class NewslettersTable
{
    public static function configure(Table $table): Table
    {
        return $table
          ->poll('5s') // 👈 this is important
            ->columns([
                TextColumn::make('email')->searchable()->sortable(),
                
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
