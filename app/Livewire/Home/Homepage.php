<?php

namespace App\Livewire\Home;

use App\Models\Post;
use Livewire\Component;

class Homepage extends Component
{
    
    public function render()
    {
        return view('livewire.home.homepage', [
            'posts' => Post::paginate(10),
        ])->layout('livewire.layout.app', [
            'title' => 'Homepage'
        ]);
    }
}
