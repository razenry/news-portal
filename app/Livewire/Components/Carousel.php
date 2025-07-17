<?php

namespace App\Livewire\Components;

use App\Models\Aspiration;
use Livewire\Component;

class Carousel extends Component
{

    public $paginate = 8;

    public function render()
    {
        return view('livewire.components.carousel', [
            'slides' => Aspiration::withoutTrashed()->where('published', '!=', 0)->where('type', '!=', 'Aspirasi')->limit($this->paginate)->orderBy('views', 'DESC')->get()
        ]);
    }
}
