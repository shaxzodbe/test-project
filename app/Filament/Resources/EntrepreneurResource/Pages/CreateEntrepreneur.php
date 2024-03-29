<?php

namespace App\Filament\Resources\EntrepreneurResource\Pages;

use App\Filament\Resources\EntrepreneurResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEntrepreneur extends CreateRecord
{
    protected static string $resource = EntrepreneurResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Entrepreneur created successfully!';
    }
}
