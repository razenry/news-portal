<?php

namespace App\Livewire\Aspiration\Partial;

use Livewire\Component;

class AspirationCard extends Component
{

    public $aspiration;
    public $category;
    public $slug;
    public $description;

    public function render()
    {
        return view('livewire.aspiration.partial.aspiration-card');
    }
}
