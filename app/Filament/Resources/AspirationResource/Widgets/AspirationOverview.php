<?php

namespace App\Filament\Resources\AspirationResource\Widgets;

use App\Models\Aspiration;
use Filament\Facades\Filament;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AspirationOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $user = Filament::auth()->user();

        // Jika super_admin atau admin, tampilkan semua data Berita
        if ($user->hasRole(['super_admin', 'admin'])) {
            return [
                Stat::make('Total Berita', Aspiration::count())
                    ->description('Semua Berita yang telah dikirimkan')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->color('primary'),

                Stat::make('Telah Dipublikasikan', Aspiration::where('published', true)->count())
                    ->description('Tampil untuk publik')
                    ->icon('heroicon-o-eye')
                    ->color('success'),

                Stat::make('Draft', Aspiration::where('published', false)->count())
                    ->description('Masih disunting atau disembunyikan')
                    ->icon('heroicon-o-pencil-square')
                    ->color('warning'),
            ];
        }

        // Jika bukan admin, tampilkan hanya Berita milik sendiri
        return [
            Stat::make('Berita Anda', Aspiration::where('user_id', $user->id)->count())
                ->description('Berita yang Anda kirimkan')
                ->icon('heroicon-o-chat-bubble-left')
                ->color('primary'),

            Stat::make('Telah Dipublikasikan', Aspiration::where('user_id', $user->id)->where('published', true)->count())
                ->description('Berita Anda yang telah dipublikasikan')
                ->icon('heroicon-o-eye')
                ->color('success'),

            Stat::make('Draft', Aspiration::where('user_id', $user->id)->where('published', false)->count())
                ->description('Draft Berita Anda')
                ->icon('heroicon-o-pencil')
                ->color('warning'),
        ];
    }
}
