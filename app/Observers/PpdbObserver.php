<?php

namespace App\Observers;

use App\Models\Ppdb;
use Illuminate\Support\Str;

class PpdbObserver
{
    /**
     * Handle the Ppdb "created" event.
     */
    public function saving(Ppdb $ppdb): void
    {
        if (!$ppdb->isDirty('name')) {
            return;
        }

        $slug = Str::slug($ppdb->name);
        $originalSlug = $slug;
        $count = 1;

        // Cek jika slug sudah ada dan bukan milik record ini
        while (Ppdb::where('slug', $slug)->where('id', '!=', $ppdb->id)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        $ppdb->slug = $slug;
    }

    public function created(Ppdb $ppdb): void
    {
        //
    }

    /**
     * Handle the Ppdb "updated" event.
     */
    public function updated(Ppdb $ppdb): void
    {
        //
    }

    /**
     * Handle the Ppdb "deleted" event.
     */
    public function deleted(Ppdb $ppdb): void
    {
        //
    }

    /**
     * Handle the Ppdb "restored" event.
     */
    public function restored(Ppdb $ppdb): void
    {
        //
    }

    /**
     * Handle the Ppdb "force deleted" event.
     */
    public function forceDeleted(Ppdb $ppdb): void
    {
        //
    }
}
