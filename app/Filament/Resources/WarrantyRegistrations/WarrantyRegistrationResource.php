<?php

namespace App\Filament\Resources\WarrantyRegistrations;

use App\Filament\Resources\WarrantyRegistrations\Pages\CreateWarrantyRegistration;
use App\Filament\Resources\WarrantyRegistrations\Pages\EditWarrantyRegistration;
use App\Filament\Resources\WarrantyRegistrations\Pages\ListWarrantyRegistrations;
use App\Filament\Resources\WarrantyRegistrations\Schemas\WarrantyRegistrationForm;
use App\Filament\Resources\WarrantyRegistrations\Tables\WarrantyRegistrationsTable;
use App\Models\WarrantyRegistration;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class WarrantyRegistrationResource extends Resource
{
    protected static ?string $model = WarrantyRegistration::class;

    protected static string | UnitEnum | null $navigationGroup = 'Customer';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::UserPlus;

    public static function form(Schema $schema): Schema
    {
        return WarrantyRegistrationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WarrantyRegistrationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWarrantyRegistrations::route('/'),
            'create' => CreateWarrantyRegistration::route('/create'),
            'edit' => EditWarrantyRegistration::route('/{record}/edit'),
        ];
    }
}
