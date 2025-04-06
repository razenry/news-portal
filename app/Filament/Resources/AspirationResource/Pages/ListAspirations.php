<?php

namespace App\Filament\Resources\AspirationResource\Pages;

use App\Filament\Resources\AspirationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAspirations extends ListRecords
{
    protected static string $resource = AspirationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            AspirationResource\Widgets\AspirationOverview::class,
        ];
    }
}
