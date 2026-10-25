<?php

namespace App\Filament\Resources\ProductEnquiries\Pages;

use App\Filament\Resources\ProductEnquiries\ProductEnquiryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProductEnquiries extends ListRecords
{
    protected static string $resource = ProductEnquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
