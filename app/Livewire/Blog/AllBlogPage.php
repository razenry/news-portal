<?php

namespace App\Livewire\Blog;

use App\Models\Aspiration;
use Livewire\Component;

class AllBlogPage extends Component
{

    public $blogs;

    public function mount()
    {

        $this->blogs = Aspiration::withoutTrashed()
            ->where('published', '!=', 0)
            ->where('type', '!=', 'Aspirasi')
            ->get();
    }

    public function render()
    {
        return view('livewire.blog.all-blog-page')->layout('livewire.layout.app');
    }
}
