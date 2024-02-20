<?php

namespace App\Filament\Resources\ActivitySphereResource\Pages;

use App\Filament\Resources\ActivitySphereResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateActivitySphere extends CreateRecord
{
    protected static string $resource = ActivitySphereResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Activity sphere created successfully!';
    }
}
