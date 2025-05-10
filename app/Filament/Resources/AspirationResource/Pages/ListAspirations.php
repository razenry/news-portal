<?php

namespace App\Filament\Resources\AspirationResource\Pages;

use App\Filament\Resources\AspirationResource;
use App\Models\Aspiration;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Builder;

class ListAspirations extends ListRecords
{
    protected static string $resource = AspirationResource::class;

    /**
     * Daftar tab yang akan ditampilkan pada halaman.
     */
    public function getTabs(): array
    {
        $user = Filament::auth()->user();

        // Jika super_admin atau admin, tampilkan semua data Berita
        if ($user->hasRole(['super_admin', 'admin'])) {
            return [
                'semua' => Tab::make('Semua')
                    ->badge(Aspiration::count()),

                'blog' => Tab::make('Blog')
                    ->modifyQueryUsing(fn(Builder $query) => $query->where('type', 'Blog'))
                    ->badge(Aspiration::where('type', 'Blog')->count()),

                'aspirasi' => Tab::make('Aspirasi')
                    ->modifyQueryUsing(fn(Builder $query) => $query->where('type', 'Aspirasi'))
                    ->badge(Aspiration::where('type', 'Aspirasi')->count()),
            ];
        }
        return [
            'semua' => Tab::make('Semua')
                ->badge(Aspiration::where('user_id', $user->id)->count()),

            'blog' => Tab::make('Blog')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('type', 'Blog'))
                ->badge(Aspiration::where('type', 'Blog')->where('user_id', $user->id)->count()),

            'aspirasi' => Tab::make('Aspirasi')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('type', 'Aspirasi'))
                ->badge(Aspiration::where('type', 'Aspirasi')->where('user_id', $user->id)->count()),
        ];
    }



    /**
     * Aksi tombol di header halaman (misal: tombol tambah data).
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Berita'),
        ];
    }

    /**
     * Widget yang akan muncul di bagian atas halaman.
     */
    protected function getHeaderWidgets(): array
    {
        return [
            AspirationResource\Widgets\AspirationOverview::class,
        ];
    }
}
