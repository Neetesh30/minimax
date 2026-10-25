<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Industry;

class IndustryDetails extends Component
{
      public $industry;

      public function mount($slug)
    {
        $this->industry = Industry::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();
    }
    
    public function render()
    {
        return view('livewire.industry-details');
    }
}
