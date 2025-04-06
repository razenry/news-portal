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

        // Jika super_admin, tampilkan total semua aspirasi
        if ($user->hasRole(['super_admin', 'admin'])) {
            return [
                Stat::make('Total Aspirations', Aspiration::count())
                    ->description('All submitted aspirations')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->color('primary'),

                Stat::make('Published', Aspiration::where('published', true)->count())
                    ->description('Visible to the public')
                    ->icon('heroicon-o-eye')
                    ->color('success'),

                Stat::make('Draft', Aspiration::where('published', false)->count())
                    ->description('Still being edited or hidden')
                    ->icon('heroicon-o-pencil-square')
                    ->color('warning'),
            ];
        }

        return [
            Stat::make('Your Aspirations', Aspiration::where('user_id', $user->id)->count())
                ->description('Aspirations submitted by you')
                ->icon('heroicon-o-chat-bubble-left')
                ->color('primary'),

            Stat::make('Published', Aspiration::where('user_id', $user->id)->where('published', true)->count())
                ->description('Your published aspirations')
                ->icon('heroicon-o-eye')
                ->color('success'),

            Stat::make('Draft', Aspiration::where('user_id', $user->id)->where('published', false)->count())
                ->description('Your drafts')
                ->icon('heroicon-o-pencil')
                ->color('warning'),
        ];
    }
}
