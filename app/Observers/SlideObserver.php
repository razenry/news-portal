<?php

namespace App\Observers;

use App\Models\Slide;
use Illuminate\Support\Str;

class SlideObserver
{
    /**
     * Handle the Slide "created" event.
     */
    public function saving(Slide $slide): void
    {
        if (!$slide->isDirty('title')) {
            return;
        }

        $slug = Str::slug($slide->title);
        $originalSlug = $slug;
        $count = 1;

        // Cek jika slug sudah ada dan bukan milik record ini
        while (Slide::where('slug', $slug)->where('id', '!=', $slide->id)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        $slide->slug = $slug;
    }

    public function created(Slide $slide): void
    {
        //
    }

    /**
     * Handle the Slide "updated" event.
     */
    public function updated(Slide $slide): void
    {
        //
    }

    /**
     * Handle the Slide "deleted" event.
     */
    public function deleted(Slide $slide): void
    {
        //
    }

    /**
     * Handle the Slide "restored" event.
     */
    public function restored(Slide $slide): void
    {
        //
    }

    /**
     * Handle the Slide "force deleted" event.
     */
    public function forceDeleted(Slide $slide): void
    {
        //
    }
}
