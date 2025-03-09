<?php

use App\Livewire\Home\Homepage;
use Illuminate\Support\Facades\Route;

Route::get('/', Homepage::class)->name('home');
