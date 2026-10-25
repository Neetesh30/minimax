<?php

namespace App\Filament\Resources\ProductEnquiries;

use App\Filament\Resources\ProductEnquiries\Pages\CreateProductEnquiry;
use App\Filament\Resources\ProductEnquiries\Pages\EditProductEnquiry;
use App\Filament\Resources\ProductEnquiries\Pages\ListProductEnquiries;
use App\Filament\Resources\ProductEnquiries\Schemas\ProductEnquiryForm;
use App\Filament\Resources\ProductEnquiries\Tables\ProductEnquiriesTable;
use App\Models\ProductEnquiry;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ProductEnquiryResource extends Resource
{
    protected static ?string $model = ProductEnquiry::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPencil;
    protected static string | UnitEnum | null $navigationGroup = 'Products';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    
    public static function form(Schema $schema): Schema
    {
        return ProductEnquiryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProductEnquiriesTable::configure($table);
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
            'index' => ListProductEnquiries::route('/'),
            'create' => CreateProductEnquiry::route('/create'),
            'edit' => EditProductEnquiry::route('/{record}/edit'),
        ];
    }
}
