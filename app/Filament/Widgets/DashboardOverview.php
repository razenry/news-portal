<?php
namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Post;
use App\Models\Unit;
use App\Models\User;
use Filament\Facades\Filament;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class DashboardOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '5s'; // Auto-refresh every 10 seconds

    protected function getCards(): array
    {
        $user = Filament::auth()->user(); // Get the logged-in user

        // Check if the user is a super admin
        if ($user->hasRole('super_admin')) {
            return [
                Card::make('Total Users', User::count())
                    ->description('Number of registered users')
                    ->icon('heroicon-o-user-group')
                    ->color('success'),

                Card::make('Total Posts', Post::count())
                    ->description('Total number of posts created')
                    ->icon('heroicon-o-document-text')
                    ->color('primary'),

                Card::make('Total Categories', Category::count())
                    ->description('Number of available categories')
                    ->icon('heroicon-o-tag')
                    ->color('warning'),

                Card::make('Total Units', Unit::count())
                    ->description('Number of available units')
                    ->icon('heroicon-o-building-office')
                    ->color('info'),
            ];
        }

        // If not super_admin, show only user's posts, but all categories & units
        return [
            Card::make('Your Posts', Post::where('user_id', $user->id)->count())
                ->description('Total posts you created')
                ->icon('heroicon-o-document-text')
                ->color('primary'),

            Card::make('Total Categories', Category::count())
                ->description('Number of available categories')
                ->icon('heroicon-o-tag')
                ->color('warning'),

            Card::make('Total Units', Unit::count())
                ->description('Number of available units')
                ->icon('heroicon-o-building-office')
                ->color('info'),
        ];
    }
}
