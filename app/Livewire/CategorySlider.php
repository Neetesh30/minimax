<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ProductCategory;

class CategorySlider extends Component
{
    public $categoryIds = []; // IDs to filter

    public function mount($ids = null)
    {
        // Accept single or multiple IDs
        if ($ids) {
            $this->categoryIds = is_array($ids) ? $ids : [$ids];
        }
    }
    

    public function render()
    {
        $categories = ProductCategory::query()
            ->when($this->categoryIds, function ($query) {
                $query->whereIn('id', $this->categoryIds);
            })
            ->where('status', true)
            ->get();

        return view('livewire.category-slider', compact('categories'));
    }
}
