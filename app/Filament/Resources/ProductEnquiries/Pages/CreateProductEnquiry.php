<?php

namespace App\Filament\Resources\ProductEnquiries\Pages;

use App\Filament\Resources\ProductEnquiries\ProductEnquiryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProductEnquiry extends CreateRecord
{
    protected static string $resource = ProductEnquiryResource::class;
}
