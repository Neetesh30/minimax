<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Video;

class VideoPage extends Component
{

     public $videos;
    public $mainVideo;


    public function mount()
    {
        // Fetch all videos ordered by 'order'
        $this->videos = Video::orderBy('order')->get();

        // Set main video
        if ($this->videos->isNotEmpty()) {
            $this->mainVideo = $this->videos->where('is_most_watched', true)->first() 
                               ?? $this->videos->first();
        } else {
            $this->mainVideo = null;
        }
    }

    public function setMainVideo($videoId)
    {
        $video = $this->videos->where('id', $videoId)->first();
        if ($video) {
            $this->mainVideo = $video;
        }
    }
    
    public function render()
    {
        return view('livewire.video-page');
    }
}
