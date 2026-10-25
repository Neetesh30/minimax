<?php

namespace App\Filament\Resources\ResourcePdfs;

use App\Filament\Resources\ResourcePdfs\Pages\CreateResourcePdf;
use App\Filament\Resources\ResourcePdfs\Pages\EditResourcePdf;
use App\Filament\Resources\ResourcePdfs\Pages\ListResourcePdfs;
use App\Filament\Resources\ResourcePdfs\Schemas\ResourcePdfForm;
use App\Filament\Resources\ResourcePdfs\Tables\ResourcePdfsTable;
use App\Models\ResourcePdf;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ResourcePdfResource extends Resource
{
    protected static ?string $model = ResourcePdf::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocument;
    protected static string | UnitEnum | null $navigationGroup = 'Resource';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Schema $schema): Schema
    {
        return ResourcePdfForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ResourcePdfsTable::configure($table);
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
            'index' => ListResourcePdfs::route('/'),
            'create' => CreateResourcePdf::route('/create'),
            'edit' => EditResourcePdf::route('/{record}/edit'),
        ];
    }
}
