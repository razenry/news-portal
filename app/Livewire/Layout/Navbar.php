<?php

namespace App\Livewire\Layout;

use App\Models\Ppdb;
use App\Models\Unit;
use App\Models\Setting;
use Livewire\Component;

class Navbar extends Component
{
    public $title = 'NewsPortal';
    public $keyword;
    public $isSearching = false;

    public function search()
    {
        return redirect()->route('search', ['query' => $this->keyword]);
    }

    public function render()
    {
        return view('livewire.layout.navbar', [
            'units' => Unit::withoutTrashed()->get(),
            'ppdbs' => Ppdb::withoutTrashed()->get(),
            'settings' => Setting::withoutTrashed()->first(),
        ]);
    }
}
