<?php

namespace App\Livewire;
use App\Models\Timeline;
use Livewire\Component;

class TimelineSection extends Component
{

     public $timelines;
    public $activeIndex = 0;
    

    public function mount()
    {
        $this->timelines = Timeline::where('is_active', true)
            ->orderBy('order')
            ->get();
    }

    public function setActive($index)
    {
        $this->activeIndex = $index;
    }

    public function next()
    {
        if ($this->activeIndex < $this->timelines->count() - 1) {
            $this->activeIndex++;
        }
    }

    public function prev()
    {
        if ($this->activeIndex > 0) {
            $this->activeIndex--;
        }
    }


    
    public function render()
    {
        return view('livewire.timeline-section');
    }
}
