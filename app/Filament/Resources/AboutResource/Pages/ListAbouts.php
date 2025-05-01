<?php

namespace App\Filament\Resources\AboutResource\Pages;

use App\Filament\Resources\AboutResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAbouts extends ListRecords
{
    protected static string $resource = AboutResource::class;

    protected function getHeaderActions(): array
    {
        // Jika sudah ada data, kembalikan array kosong (sembunyikan tombol)
        if ($this->getModel()::count() >= 1) {
            return [];
        }

        // Jika belum ada data, tampilkan tombol Create
        return [
            Actions\CreateAction::make(),
        ];
    }
}