<?php

namespace App\Providers;

use App\Models\Aspiration;
use App\Models\Category;
use App\Models\Post;
use App\Observers\AspirationObserver;
use App\Observers\CategoryObserver;
use App\Observers\PostObserver;
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
        Post::observe(PostObserver::class);
        Category::observe(CategoryObserver::class);
    }
}
