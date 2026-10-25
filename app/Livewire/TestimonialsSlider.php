<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Testimonial;


class TestimonialsSlider extends Component
{
    public function render()
    {
         return view('livewire.testimonials-slider', [
            'testimonials' => Testimonial::where('is_active', true)->latest()->get()
        ]);
    }
}
