<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Industry;


class IndustriesSection extends Component
{
    public function render()
    {
        return view('livewire.industries-section',
        [
            'industries' => Industry::where('is_active', true)->get(),
        ]);
    }
}
