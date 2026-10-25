<?php

namespace App\Filament\Resources\ProductEnquiries\Pages;

use App\Filament\Resources\ProductEnquiries\ProductEnquiryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProductEnquiry extends EditRecord
{
    protected static string $resource = ProductEnquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
