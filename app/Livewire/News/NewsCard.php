<?php

namespace App\Livewire\News;

use App\Models\Aspiration;
use Livewire\Component;

class NewsCard extends Component
{
    public $thumbnail;
    public $title;
    public $category;
    public $author;
    public $created_at;
    public $description;
    public $tags;
    public $blog;

    public function render()
    {
        return view('livewire.news.news-card');
    }
}
