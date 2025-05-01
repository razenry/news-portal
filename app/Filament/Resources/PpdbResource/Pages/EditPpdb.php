<?php

namespace App\Filament\Resources\PpdbResource\Pages;

use App\Filament\Resources\PpdbResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPpdb extends EditRecord
{
    protected static string $resource = PpdbResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
