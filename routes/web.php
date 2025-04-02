<?php

use App\Livewire\Aspiration\AspirationPage;
use App\Livewire\Home\Homepage;
use Illuminate\Support\Facades\Route;

Route::get('/', Homepage::class)->name('home');
Route::get('/aspiration/{slug}', AspirationPage::class)->name('aspiration.show');
