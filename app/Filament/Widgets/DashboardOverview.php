<?php

namespace App\Filament\Widgets;

use App\Models\Aspiration;
use App\Models\Category;
use App\Models\Post;
use App\Models\Unit;
use App\Models\User;
use Filament\Facades\Filament;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class DashboardOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '5s'; // Refresh otomatis setiap 5 detik

    protected function getCards(): array
    {
        $user = Filament::auth()->user(); // Ambil data pengguna yang sedang login

        // Cek apakah pengguna adalah super admin atau admin
        if ($user->hasRole(['super_admin', 'admin'])) {
            return [
                Card::make('Total Pengguna', User::count())
                    ->description('Jumlah pengguna yang terdaftar')
                    ->icon('heroicon-o-user-group')
                    ->color('success'),

                Card::make('Total Kategori', Category::count())
                    ->description('Jumlah kategori yang tersedia')
                    ->icon('heroicon-o-tag')
                    ->color('warning'),

                Card::make('Total Unit', Unit::count())
                    ->description('Jumlah unit yang tersedia')
                    ->icon('heroicon-o-building-office')
                    ->color('info'),
            ];
        }

        // Jika bukan super admin/admin, hanya tampilkan kategori & unit
        return [
            Card::make('Postingan Saya', Aspiration::where('user_id', $user->id)->count())
                ->description('Jumlah postingan yang Anda buat')
                ->icon('heroicon-o-document-text')
                ->color('primary'),


            Card::make('Total Kategori', Category::count())
                ->description('Jumlah kategori yang tersedia')
                ->icon('heroicon-o-tag')
                ->color('warning'),

            Card::make('Total Unit', Unit::count())
                ->description('Jumlah unit yang tersedia')
                ->icon('heroicon-o-building-office')
                ->color('info'),
        ];
    }
}
