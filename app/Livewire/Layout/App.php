<?php

namespace App\Livewire\Layout;

use Livewire\Component;

class App extends Component
{

    public $title = 'NewsPortal';

    public function render()
    {
        return view('livewire.layout.app');
    }
}
