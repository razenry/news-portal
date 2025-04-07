<?php

namespace App\Livewire\Aspiration\Partial;

use App\Models\Aspiration;
use App\Models\CommentAspiration;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AspirationComments extends Component
{
    public $aspiration;
    public $content;
    public $slug;
    public $parentId = null;

    protected $rules = [
        'content' => 'required|min:3|max:1000'
    ];

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->aspiration = Aspiration::where('slug', $this->slug)->firstOrFail();
    }

    public function render()
    {
        $comments = $this->aspiration->comment()
            ->with(['user', 'replies.user'])
            ->get();

        return view('livewire.aspiration.aspiration-comment', compact('comments'));
    }

    public function addComment()
    {
        $this->validate();

        $comment = CommentAspiration::create([
            'aspiration_id' => $this->aspiration->id,
            'user_id' => Auth::id(),
            'content' => $this->content,
            'parent_id' => $this->parentId,
            'is_published' => true
        ]);

        $this->content = '';
        $this->parentId = null;

        $this->dispatch('comment-added');
    }

    public function reply($commentId)
    {
        $this->parentId = $commentId;
        $this->dispatch('focus-comment');
    }

    public function deleteComment($commentId)
    {
        $comment = CommentAspiration::findOrFail($commentId);

        // Cek apakah user adalah pembuat komentar atau pemilik aspirasi
        if (Auth::id() === $comment->user_id || Auth::id() === $comment->aspiration->user_id) {
            $comment->delete();
            $this->dispatch('comment-deleted');
        }
    }
}
