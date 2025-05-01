<?php

namespace App\Livewire\Layout;

use App\Models\Ppdb;
use App\Models\Unit;
use Livewire\Component;

class Navbar extends Component
{
    public $title = 'NewsPortal';

    public function render()
    {
        return view('livewire.layout.navbar', [
            'units' => Unit::withoutTrashed()->get(),
            'ppdbs' => Ppdb::withoutTrashed()->get(),
        ]);
    }
}
