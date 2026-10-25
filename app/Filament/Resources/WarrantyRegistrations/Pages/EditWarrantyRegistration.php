<?php

namespace App\Filament\Resources\WarrantyRegistrations\Pages;

use App\Filament\Resources\WarrantyRegistrations\WarrantyRegistrationResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditWarrantyRegistration extends EditRecord
{
    protected static string $resource = WarrantyRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
