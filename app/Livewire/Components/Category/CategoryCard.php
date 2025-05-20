<?php

namespace App\Livewire\Components\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryCard extends Component
{

    public $paginate = 8;

    public function render()
    {
        return view('livewire.components.category.category-card', [
            'categories' => Category::withoutTrashed()->latest()->paginate($this->paginate),
        ]);
    }
}
