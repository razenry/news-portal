<?php

namespace App\Livewire\Aspiration;

use App\Models\Aspiration;
use Livewire\Component;

class AllAspirationPage extends Component
{
    public $aspirations;

    public function mount()
    {

        $this->aspirations = Aspiration::withoutTrashed()
            ->where('published', '!=', 0)
            ->where('type', '!=', 'Blog')
            ->get();
    }

    public function render()
    {
        return view('livewire.aspiration.all-aspiration-page')->layout('livewire.layout.app');
    }
}
