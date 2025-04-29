<?php

use App\Http\Controllers\AuthController;
use App\Livewire\Aspiration\AllAspirationPage;
use App\Livewire\Aspiration\AspirationPage;
use App\Livewire\Blog\AllBlogPage;
use App\Livewire\Blog\BlogPage;
use App\Livewire\Home\Homepage;
use App\Livewire\Unit\UnitPage;
use Illuminate\Support\Facades\Route;
use Filament\Http\Controllers\Auth\LogoutController;

Route::get('/', Homepage::class)->name('home');

Route::get('/aspiration/{slug}', AspirationPage::class)->name('aspiration.show');

Route::get('/aspirasi/{slug}', AspirationPage::class)->name('aspiration.show');
Route::get('/aspirasi', AllAspirationPage::class)->name('aspiration.all');
Route::get('/blog/{slug}', BlogPage::class)->name('blog.show');
Route::get('/blog', AllBlogPage::class)->name('blog.all');
Route::get('/unit/{slug}', UnitPage::class)->name('unit.show');

Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');