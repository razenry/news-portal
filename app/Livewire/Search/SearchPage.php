<?php

namespace App\Livewire\Search;

use App\Models\Aspiration;
use Livewire\Component;

class SearchPage extends Component
{
    public $keyword;
    public $aspirations;
    public $blogs;

    public function mount(string $query)
    {
        $this->keyword = $query;

        // Get published aspirations that match search keyword
        $this->aspirations = Aspiration::withoutTrashed()
            ->where('published', '!=', 0)
            ->where('type', 'Aspirasi')
            ->where(function ($q) {
                $q->where('title', 'like', '%' . $this->keyword . '%')
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
                    ->orWhereHas('comments', function ($query) {
                        $query->where('body', 'like', '%' . $this->keyword . '%');
                    });
            })
            ->latest()
            ->with(['author', 'category', 'unit'])
            ->get();

        // Get published blogs that match search keyword
        $this->blogs = Aspiration::withoutTrashed()
            ->where('published', '!=', 0)
            ->where('type', 'Blog')
            ->where(function ($q) {
                $q->where('title', 'like', '%' . $this->keyword . '%')
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
                    ->orWhereHas('comments', function ($query) {
                        $query->where('body', 'like', '%' . $this->keyword . '%');
                    });
            })
            ->latest()
            ->with(['author', 'category', 'unit'])
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
