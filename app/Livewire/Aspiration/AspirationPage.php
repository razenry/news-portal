<?php

namespace App\Livewire\Aspiration;

use App\Models\Aspiration;
use Livewire\Component;

class AspirationPage extends Component
{
    public $aspiration;
    protected $slug;

    protected function getRelatedAspirationProperty()
    {
        return Aspiration::where('category_id', $this->aspiration->category->id)
            ->where('slug', '!=', $this->slug)
            ->where('published', '!=', 0)
            ->where('type','!=', 'Blog')
            ->withoutTrashed()
            ->orderBy('created_at', 'DESC')
            ->paginate(8);
    }

    public function mount(string $slug)
    {
        $this->slug = $slug;
        $this->aspiration = Aspiration::where('slug', $slug)
            ->where('type','!=', 'Blog') 
            ->withoutTrashed()
            ->where('published', '!=', 0)
            ->firstOrFail();

        // Increment views count    
        $this->aspiration->increment('views');        
    }

    public function render()
    {
        $title = $this->aspiration ? $this->aspiration->title : 'Unknown Title';

        return view('livewire.aspiration.aspiration-page', [
            'relatedAspiration' => $this->getRelatedAspirationProperty(), // Mengakses computed property
        ])->layout('livewire.layout.app', [
            'title' => "Kata Mereka : " . $title,
        ]);
    }
}
