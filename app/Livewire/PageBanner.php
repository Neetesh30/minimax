<?php

namespace App\Livewire;
use App\Models\Banner;
use Livewire\Component;
use Illuminate\Support\Facades\Route;

class PageBanner extends Component
{
     public $banner;

     public function mount()
    {
        $routeName = Route::currentRouteName();

        $this->banner = Banner::where('route_name', $routeName)->first();
    }
    
    public function render()
    {
        return view('livewire.page-banner');
    }
}
