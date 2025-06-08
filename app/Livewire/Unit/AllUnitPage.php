<?php

namespace App\Livewire\Unit;

use App\Models\Unit;
use Livewire\Component;

class AllUnitPage extends Component
{

    public $title;
    public $unit;
    public $slug;
    public $blogs;
    public $aspirations;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->unit = Unit::withoutTrashed()->where('slug', $this->slug)->first();
        if (!$this->unit) {
            abort(404);
        }
        $this->title = $this->unit->name;
        $this->blogs = $this->unit->blogs()
            ->where('published', '!=', 0)->withoutTrashed()->latest()->get();
        $this->aspirations = $this->blogs;
    }

    public function render()
    {

        return view('livewire.unit.all-unit-page')->layout('livewire.layout.app', [
            'title' => "Semua dari Unit : $this->title",
        ]);
    }
}
