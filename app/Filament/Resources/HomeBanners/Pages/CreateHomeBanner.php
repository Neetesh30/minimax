<?php

namespace App\Filament\Resources\HomeBanners\Pages;

use App\Filament\Resources\HomeBanners\HomeBannerResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateHomeBanner extends CreateRecord
{
    protected static string $resource = HomeBannerResource::class;

    protected static bool $canCreateAnother = false;

    protected function getCreateFormAction(): Action
    {
        return parent::getCreateFormAction()->label('Save banner');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['route_name'] = 'home';

        return $data;
    }
}
