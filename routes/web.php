<?php

use App\Http\Controllers\AuthController;
use App\Livewire\Aspiration\AllAspirationPage;
use App\Livewire\Aspiration\AspirationPage;
use App\Livewire\Blog\AllBlogPage;
use App\Livewire\Blog\BlogPage;
use App\Livewire\Home\Homepage;
use App\Livewire\Ppdb\PpdbPage;
use App\Livewire\Unit\UnitPage;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', Homepage::class)->name('home');

// Aspiration
Route::get('/aspirasi/{slug}', AspirationPage::class)->name('aspiration.show');
Route::get('/aspirasi', AllAspirationPage::class)->name('aspiration.all');

// Blog
Route::get('/blog/{slug}', BlogPage::class)->name('blog.show');
Route::get('/blog', AllBlogPage::class)->name('blog.all');

// Unit
Route::get('/unit/{slug}', UnitPage::class)->name('unit.show');

// Ppdb
Route::get('/ppdb/{slug}', PpdbPage::class)->name('ppdb.show');

// Auth
Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');