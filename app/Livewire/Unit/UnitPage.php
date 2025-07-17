<?php

namespace App\Livewire\Unit;

use App\Models\Unit;
use Livewire\Component;

class UnitPage extends Component
{
    public $title;
    public $unit;
    public $blogs;
    public $aspirations;


    public function mount(string $slug)
    {
        $this->unit = Unit::where('slug', $slug)->firstOrFail();
        $this->title = $this->unit->name;
        $this->blogs = $this->unit->blogs()
            ->withoutTrashed()
            ->where('published', '!=', 0)
            ->where('type', '!=', 'Aspirasi')
            ->latest()
            ->get();
        $this->aspirations = $this->unit->blogs()
            ->withoutTrashed()
            ->where('published', '!=', 0)
            ->where('type', '!=', 'Blog')
            ->latest()
            ->get();
    }

    public function render()
    {
        return view('livewire.unit.unit-page')->layout('livewire.layout.app', [
            'title' => 'Unit : ' . $this->title,
        ]);
    }
}
