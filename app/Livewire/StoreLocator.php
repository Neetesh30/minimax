<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Store;
use Illuminate\Support\Facades\Http;


class StoreLocator extends Component
{

    public $pincode = '';
    public $latitude;
    public $longitude;
    public $stores = [];

    public function mount()
    {
        $this->stores = Store::where('is_active',1)->get()->toArray();
        $this->dispatch('updateMap', stores: $this->stores, fitIndia: true);
    }

     public function search()
    {
        if (!$this->pincode) {
            $this->mount();
            return;
        }

        $geo = Http::get('https://nominatim.openstreetmap.org/search', [
            'q' => $this->pincode,
            'format' => 'json',
            'limit' => 1,
        ])->json();

        if (!$geo) return;

        $this->latitude = $geo[0]['lat'];
        $this->longitude = $geo[0]['lon'];

        $this->stores = Store::where('is_active',1)
            ->distance($this->latitude, $this->longitude)
            ->having('distance','<=',50)
            ->orderBy('distance')
            ->get()
            ->toArray();

        $this->dispatch('centerMap', lat: $this->latitude, lng: $this->longitude);
        $this->dispatch('updateMap', stores: $this->stores);
    }
    
    public function render()
    {
        // Include the outline in the initial HTML instead of fetching it after
        // the basemap is already visible. Keep it out of Livewire's public state.
        $boundaryPath = public_path('front/maps/india-boundary.geojson');
        $indiaBoundary = is_file($boundaryPath)
            ? json_decode(file_get_contents($boundaryPath), true)
            : null;

        return view('livewire.store-locator', compact('indiaBoundary'));
    }
}
