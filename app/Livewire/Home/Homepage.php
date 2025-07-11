<?php

namespace App\Livewire\Home;

use App\Models\Aspiration;
use App\Models\Post;
use App\Models\Category;
use App\Models\Slide;
use Livewire\Component;

class Homepage extends Component
{
    public function render()
    {
        return view('livewire.home.homepage', [
            'categories' => Category::withoutTrashed()->paginate(8),
            'slides' => Aspiration::withoutTrashed()->where('published', '!=', 0)->latest()->limit(8)->get(),
            'aspirations' => Aspiration::query()
                ->where('published', '!=', 0)
                ->withoutTrashed()
                ->orderBy('views', 'DESC')
                ->get(),
            'blogs' => Aspiration::query()
                ->where('published', '!=', 0)
                ->where('type', 'Blog')
                ->withoutTrashed()
                ->orderBy('created_at', 'DESC')
                ->paginate(2),
        ])->layout('livewire.layout.app', [
                    'title' => 'Beranda'
                ]);
    }
}
