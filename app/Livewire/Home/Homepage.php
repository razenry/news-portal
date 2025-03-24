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
            'posts' => Post::where('published', '!=', 0)->paginate(10),
            'categories' => Category::withoutTrashed()->get(),
        ])->layout('livewire.layout.app', [
            'title' => 'Homepage'
        ]);
    }
}
