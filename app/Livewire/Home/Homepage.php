<?php

namespace App\Livewire\Home;

use App\Models\Post;
use App\Models\Category;
use Livewire\Component;

class Homepage extends Component
{

    public function render()
    {
        return view('livewire.home.homepage', [
            'posts' => Post::where('published', '!=', 0)->withoutTrashed()->orderBy('created_at', 'DESC')->paginate(8),
            'categories' => Category::withoutTrashed()->paginate(8),
        ])->layout('livewire.layout.app', [
            'title' => 'Homepage'
        ]);
    }
}
