<?php

use App\Livewire\Aspiration\AllAspirationPage;
use App\Livewire\Aspiration\AspirationPage;
use App\Livewire\Blog\AllBlogPage;
use App\Livewire\Blog\BlogPage;
use App\Livewire\Home\Homepage;
use Illuminate\Support\Facades\Route;

Route::get('/', Homepage::class)->name('home');
Route::get('/aspirasi/{slug}', AspirationPage::class)->name('aspiration.show');
Route::get('/aspirasi', AllAspirationPage::class)->name('aspiration.all');
Route::get('/blog/{slug}', BlogPage::class)->name('blog.show');
Route::get('/blog', AllBlogPage::class)->name('blog.all');

