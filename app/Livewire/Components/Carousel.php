<?php

namespace App\Livewire\Components;

use App\Models\Slide;
use Livewire\Component;

class Carousel extends Component
{

    public $paginate = 5;

    public function render()
    {
        return view('livewire.components.carousel', [
            'slides' => Slide::where('published', '!=', 0)->withoutTrashed()->orderBy('created_at', 'DESC')->paginate($this->paginate),
        ]);
    }
}
