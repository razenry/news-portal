<?php

namespace App\Observers;

use App\Models\Aspiration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AspirationObserver
{
    /**
     * Auto-generate unique slug saat saving.
     */
    public function saving(Aspiration $aspiration): void
    {
        if (!$aspiration->isDirty('title')) {
            return;
        }

        $slug = Str::slug($aspiration->title);
        $originalSlug = $slug;
        $count = 1;

        // Cek jika slug sudah ada dan bukan milik record ini
        while (Aspiration::where('slug', $slug)->where('id', '!=', $aspiration->id)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        $aspiration->slug = $slug;
    }

    public function created(Aspiration $aspiration): void
    {
        if (!$aspiration->user_id) {
            $aspiration->user_id = Auth::id();
        }
    }
    public function updated(Aspiration $aspiration): void
    {
    }
    public function deleted(Aspiration $aspiration): void
    {
    }
    public function restored(Aspiration $aspiration): void
    {
    }
    public function forceDeleted(Aspiration $aspiration): void
    {
    }
}
