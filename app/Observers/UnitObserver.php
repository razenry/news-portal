<?php

namespace App\Observers;

use App\Models\Unit;
use Illuminate\Support\Str;

class UnitObserver
{
    public function saving(Unit $unit): void
    {
        if (!$unit->isDirty('name')) {
            return;
        }

        $slug = Str::slug($unit->name);
        $originalSlug = $slug;
        $count = 1;

        // Cek jika slug sudah ada dan bukan milik record ini
        while (Unit::where('slug', $slug)->where('id', '!=', $unit->id)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        $unit->slug = $slug;
    }

    /**
     * Handle the Unit "created" event.
     */
    public function created(Unit $unit): void
    {
        //
    }

    /**
     * Handle the Unit "updated" event.
     */
    public function updated(Unit $unit): void
    {
        //
    }

    /**
     * Handle the Unit "deleted" event.
     */
    public function deleted(Unit $unit): void
    {
        //
    }

    /**
     * Handle the Unit "restored" event.
     */
    public function restored(Unit $unit): void
    {
        //
    }

    /**
     * Handle the Unit "force deleted" event.
     */
    public function forceDeleted(Unit $unit): void
    {
        //
    }
}
