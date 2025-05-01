<?php

namespace App\Livewire\About;

use App\Models\About;
use Livewire\Component;

class AboutSection extends Component
{
    public $about;

    public function mount() {
        $this->about = About::first();
    }
    public function render()
    {
        return view('livewire.about.about-section');
    }
}
