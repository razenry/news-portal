<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class AllCategoryPage extends Component
{
    public $category;
    public $title = "Semua Kategori";

    public function mount()
    {
        $this->category = Category::withoutTrashed()
            ->latest()->get();
    }

    public function render()
    {
        return view('livewire.category.all-unit-page')->layout('livewire.layout.app', [
            'title' => $this->title,
        ]);
    }
}
