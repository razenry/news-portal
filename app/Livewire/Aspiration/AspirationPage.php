<?php

namespace App\Livewire\Aspiration;

use App\Models\Aspiration;
use Livewire\Component;

class AspirationPage extends Component
{

    public $aspiration = [];

    public function mount(String $slug)
    {
        $this->aspiration = Aspiration::where('slug', $slug)->first();
    }

    public function render()
    {
        return view('livewire.aspiration.aspiration-page')->layout('layouts.app')->layout('livewire.layout.app', [
            'title' => "Kata Mereka : " . $this->aspiration->title,
        ]);
    }
}
