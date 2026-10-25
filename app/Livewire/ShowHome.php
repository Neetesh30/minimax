<?php

namespace App\Livewire;

use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ShowHome extends Component
{
    public function render()
    {
        $homeBanners = Banner::where('route_name', 'home')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->filter(fn (Banner $banner) => filled($banner->image)
                && Storage::disk('public')->exists($banner->image));

        return view('livewire.show-home', ['homeBanners' => $homeBanners]);
    }
}
