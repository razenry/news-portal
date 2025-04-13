<?php

namespace App\Livewire\Blog;

use App\Models\Aspiration;
use Livewire\Component;

class BlogPage extends Component
{
    public $aspiration;
    protected $slug;

    protected function getRelatedBlogProperty()
    {
        return Aspiration::where('category_id', $this->aspiration->category->id)
            ->where('slug', '!=', $this->slug)
            ->where('published', '!=', 0)
            ->where('type', '!=', 'Aspirasi')
            ->withoutTrashed()
            ->orderBy('created_at', 'DESC')
            ->paginate(8);
    }

    public function mount(string $slug)
    {
        $this->slug = $slug;
        $this->aspiration = Aspiration::where('slug', $slug)
            ->withoutTrashed()
            ->where('published', '!=', 0)
            ->where('type', '!=', 'Aspirasi')
            ->firstOrFail();
    }

    public function render()
    {
        $title = $this->aspiration ? $this->aspiration->title : 'Judul Tidak Di Ketahui';

        return view('livewire.blog.blog-page', [
            'relatedAspiration' => $this->getRelatedBlogProperty(),
        ])->layout('livewire.layout.app', [
            'title' => "Blog : " . $title,
        ]);
    }
}
