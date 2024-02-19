<?php

namespace App\Filament\Resources\ActivitySphereResource\Pages;

use App\Filament\Resources\ActivitySphereResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListActivitySpheres extends ListRecords
{
    protected static string $resource = ActivitySphereResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
