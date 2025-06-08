<?php

namespace App\Livewire\Layout;

use App\Models\Contact;
use App\Models\Unit;
use App\Models\Setting;
use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        return view('livewire.layout.footer', [
            'units' => Unit::withoutTrashed()->get(),
            'contacts' => Contact::where('type', 'phone')->withoutTrashed()->limit(3)->get(),
            'socmeds' => Contact::where('type', 'social_media')->withoutTrashed()->limit(3)->get(),
            'settings' => Setting::withoutTrashed()->first(),
        ]);
    }
}
