<?php

namespace App\Livewire\Unit;

use App\Models\Unit;
use Livewire\Component;

class UnitPage extends Component
{
    public $title;
    public $unit;

    public $blogs;

    public function mount(String $slug)
    {
        $this->unit = Unit::where('slug', $slug)->firstOrFail();
        $this->title = $this->unit->name;
        $this->blogs = $this->unit->blogs()
        ->where('published', '!=', 0)->latest()->take(16)->get();
    }

    public function render()
    {
        return view('livewire.unit.unit-page')->layout('livewire.layout.app', [
            'title' => 'Unit : '.$this->title,
        ]);
    }
}
