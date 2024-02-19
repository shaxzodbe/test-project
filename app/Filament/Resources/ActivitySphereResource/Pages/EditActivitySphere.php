<?php

namespace App\Filament\Resources\ActivitySphereResource\Pages;

use App\Filament\Resources\ActivitySphereResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditActivitySphere extends EditRecord
{
    protected static string $resource = ActivitySphereResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
