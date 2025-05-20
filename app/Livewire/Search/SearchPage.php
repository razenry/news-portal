<?php

namespace App\Livewire\Search;

use App\Models\Aspiration;
use Livewire\Component;

class SearchPage extends Component
{
    public $keyword;
    public $aspirations;

    public function mount(string $query)
    {
        $this->keyword = $query;

        $this->aspirations = Aspiration::where('title', 'like', '%' . $this->keyword . '%')
            ->orWhere('description', 'like', '%' . $this->keyword . '%')
            ->orWhereHas('author', function ($query) {
                $query->where('name', 'like', '%' . $this->keyword . '%');
            })
            ->orWhereHas('category', function ($query) {
                $query->where('name', 'like', '%' . $this->keyword . '%');
            })
            ->orWhereHas('unit', function ($query) {
                $query->where('name', 'like', '%' . $this->keyword . '%');
            })
            ->orWhereHas('comment', function ($query) {
                $query->where('body', 'like', '%' . $this->keyword . '%');
            })
            ->orWhereHas('comments', function ($query) {
                $query->where('body', 'like', '%' . $this->keyword . '%');
            })
            ->orWhereHas('allComments', function ($query) {
                $query->where('body', 'like', '%' . $this->keyword . '%');
            })
            ->where('published', '!=', 0)
            ->with(['author', 'category', 'unit']) // Eager load relationships
            ->get();
    }

    public function render()
    {
        return view('livewire.search.search-page', [
            'aspirations' => $this->aspirations
        ])->layout('livewire.layout.app', [
                    'title' => 'Pencarian : ' . $this->keyword,
                ]);
    }
}
