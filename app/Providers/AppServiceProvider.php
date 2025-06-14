<?php

namespace App\Providers;

use App\Models\Aspiration;
use App\Models\Category;
use App\Models\Ppdb;
use App\Models\Unit;
use App\Observers\AspirationObserver;
use App\Observers\CategoryObserver;
use App\Observers\PpdbObserver;
use App\Observers\UnitObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Aspiration::observe(AspirationObserver::class);
        Category::observe(CategoryObserver::class);
        Unit::observe(UnitObserver::class);
        Ppdb::observe(PpdbObserver::class);
    }
}
