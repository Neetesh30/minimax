<?php

namespace App\Livewire;
use App\Models\Product;

use Livewire\Component;

class ProductFaq extends Component
{
     public Product $product;

      public function mount(Product $product)
    {
        // The product is automatically loaded by route model binding
        $this->product = $product;
    }
    
    public function render()
    {
        return view('livewire.product-faq');
    }
}
