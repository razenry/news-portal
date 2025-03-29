<?php

namespace App\Livewire\Components\Aspiration;

use App\Models\Aspiration;
use Livewire\Component;

class AspirationCard extends Component
{

    public $paginate = 2;

    public function render()
    {
        return view('livewire.components.aspiration.aspiration-card', [
            'aspirations' => Aspiration::where('published', '!=', 0)->withoutTrashed()->orderBy('created_at', 'DESC')->paginate($this->paginate),
        ]);
    }
}
