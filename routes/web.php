<?php

use App\Livewire\Aspiration\AspirationPage;
use App\Livewire\Home\Homepage;
use App\Livewire\Unit\UnitPage;
use Illuminate\Support\Facades\Route;

Route::get('/', Homepage::class)->name('home');
<<<<<<< Updated upstream
Route::get('/aspiration/{slug}', AspirationPage::class)->name('aspiration.show');
=======
Route::get('/aspirasi/{slug}', AspirationPage::class)->name('aspiration.show');
Route::get('/aspirasi', AllAspirationPage::class)->name('aspiration.all');
Route::get('/blog/{slug}', BlogPage::class)->name('blog.show');
Route::get('/blog', AllBlogPage::class)->name('blog.all');
Route::get('/unit/{slug}', UnitPage::class)->name('unit.show');

>>>>>>> Stashed changes
