<?php

namespace App\Filament\Resources\ResourcePdfs\Pages;

use App\Filament\Resources\ResourcePdfs\ResourcePdfResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditResourcePdf extends EditRecord
{
    protected static string $resource = ResourcePdfResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
