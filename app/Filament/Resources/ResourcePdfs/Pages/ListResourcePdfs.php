<?php

namespace App\Filament\Resources\ResourcePdfs\Pages;

use App\Filament\Resources\ResourcePdfs\ResourcePdfResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListResourcePdfs extends ListRecords
{
    protected static string $resource = ResourcePdfResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
