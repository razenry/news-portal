<?php

namespace App\Livewire\Components\Post;

use App\Models\Post;
use Livewire\Component;

class PostCard extends Component
{
    
    public $paginate = 8;

    public function render()
    {
        return view('livewire.components.post.post-card', [
            'posts' => Post::where('published', '!=', 0)->withoutTrashed()->orderBy('created_at', 'DESC')->paginate($this->paginate),
        ]);
    }
}
