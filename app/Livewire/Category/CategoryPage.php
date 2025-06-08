<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryPage extends Component
{
    public $category;
    public $title;
    public $slug;
    public $blogs;
    public $aspirations;

    public function mount(string $slug)
    {
        $this->slug = $slug;
        $this->category = Category::withoutTrashed()
            ->where('slug', $this->slug)->first();
        if ($this->category) {
            $this->title = $this->category->name;
        } else {
            abort(404);
        }
        $this->blogs = $this->category->blogs()
            ->withoutTrashed()
            ->where('published', '!=', 0)
            ->latest()
            ->get();
        $this->aspirations = $this->blogs;
    }

    public function render()
    {
        return view('livewire.category.category-page')->layout('livewire.layout.app', [
            'title' => "Kategori : " . $this->title,
        ]);
    }
}
