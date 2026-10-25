<?php

namespace App\Livewire;

use App\Models\Office;
use Livewire\Component;

class OfficeCard extends Component
{
    public function render()
    {
         $offices = Office::all(); // fetch all offices
        return view('livewire.office-card',compact('offices'));
    }
}
