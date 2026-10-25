<?php

namespace App\Livewire;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Collection;
use App\Services\SeoManager;


class ShowProduct extends Component
{

    public Product $product;
    public Collection $relatedProducts;

     public function mount(string $slug)
    {

        $this->product = Product::with(['category', 'subcategory', 'subsubcategory'])
            ->where('status', true)
            ->where('slug', $slug)
            ->firstOrFail();
    

        // ✅ Initialize as empty collection
        $this->relatedProducts = collect();

        // 1️⃣ Same subsubcategory
        if ($this->product->subsubcategory_id) {
            $this->relatedProducts = Product::where('status', true)
                ->where('id', '!=', $this->product->id)
                ->where('subsubcategory_id', $this->product->subsubcategory_id)
                ->take(4)
                ->get();
        }

        // 2️⃣ Same subcategory (if not enough)
        if ($this->relatedProducts->count() < 4 && $this->product->subcategory_id) {
            $more = Product::where('status', true)
                ->where('id', '!=', $this->product->id)
                ->where('subcategory_id', $this->product->subcategory_id)
                ->take(4 - $this->relatedProducts->count())
                ->get();

            $this->relatedProducts = $this->relatedProducts->merge($more);
        }

        // 3️⃣ Same category (if still not enough)
        if ($this->relatedProducts->count() < 4 && $this->product->category_id) {
            $more = Product::where('status', true)
                ->where('id', '!=', $this->product->id)
                ->where('category_id', $this->product->category_id)
                ->take(4 - $this->relatedProducts->count())
                ->get();

            $this->relatedProducts = $this->relatedProducts->merge($more);
        }

        // ✅ Ensure final collection has unique IDs
        $this->relatedProducts = $this->relatedProducts->unique('id')->values();
    }
    
   public function render()
{
    return view('livewire.show-product', [
        'seo' => SeoManager::resolve($this->product),
    ]);
}
}
