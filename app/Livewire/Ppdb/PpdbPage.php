<?php

namespace App\Livewire\Ppdb;

use App\Models\Ppdb;
use Livewire\Component;

class PpdbPage extends Component
{
    public $title;

    public $ppdb;

    public $unit;
    public $blogs;
    public $aspirations;

    public function mount(string $slug)
    {
        $this->ppdb = Ppdb::where('slug', $slug)->firstOrFail();
        $this->title = $this->ppdb->name;
        $this->unit = $this->ppdb->unit;
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
        return view('livewire.ppdb.ppdb-page')->layout('livewire.layout.app', [
            'title' => 'PPDB : ' . $this->title,
        ]);
    }
}
