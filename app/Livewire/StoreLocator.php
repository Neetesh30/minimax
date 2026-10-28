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
        return view('livewire.store-locator');
    }
}
