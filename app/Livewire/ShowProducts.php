<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\WithPagination;

class ShowProducts extends Component
{

    use WithPagination;

    public $selectedCategory = null;
    public $selectedSubcategory = null;
    public $selectedSubsubcategory = null;
    public $search = '';

    public $slug = null; // breadcrumb filter slug

    public function mount($slug = null)
    {
        if ($slug) {
            $category = ProductCategory::where('slug', $slug)->first();

            if ($category) {
                // if it’s a parent category
                if ($category->parent_id === null) {
                    $this->selectedCategory = $category->id;
                }
                // if it’s a subcategory
                elseif ($category->parent?->parent_id === null) {
                    $this->selectedCategory = $category->parent_id;
                    $this->selectedSubcategory = $category->id;
                }
                // if it’s a subsubcategory
                else {
                    $this->selectedCategory = $category->parent->parent_id;
                    $this->selectedSubcategory = $category->parent_id;
                    $this->selectedSubsubcategory = $category->id;
                }
            }
        }
    }

    public function updating($property)
    {
        if (in_array($property, ['selectedCategory', 'selectedSubcategory'])) {
            $this->resetPage(); // reset pagination on filter change
        }
    }

    public function render()
{
    $query = Product::query()->where('status', true)->with(['category', 'subcategory', 'subsubcategory']);

    if ($this->selectedCategory) {
        $query->where('category_id', $this->selectedCategory);
    }

    if ($this->selectedSubcategory) {
        $query->where('subcategory_id', $this->selectedSubcategory);
    }

    if ($this->selectedSubsubcategory) {
        $query->where('subsubcategory_id', $this->selectedSubsubcategory);
    }

    if ($this->search) {
        $query->where(function($q) {
            $q->where('name', 'like', '%' . $this->search . '%')
              ->orWhere('sku', 'like', '%' . $this->search . '%');
        });
    }

    $products = $query->paginate(6);

    // Get category objects for breadcrumb
    $categoryObj = $this->selectedCategory ? ProductCategory::find($this->selectedCategory) : null;
    $subcategoryObj = $this->selectedSubcategory ? ProductCategory::find($this->selectedSubcategory) : null;
    $subsubcategoryObj = $this->selectedSubsubcategory ? ProductCategory::find($this->selectedSubsubcategory) : null;

    return view('livewire.show-products', [
        'products' => $products,
        'categories' => ProductCategory::whereNull('parent_id')->get(),
        'subcategories' => $this->selectedCategory 
            ? ProductCategory::where('parent_id', $this->selectedCategory)->get()
            : collect(),
        'subsubcategories' => $this->selectedSubcategory 
            ? ProductCategory::where('parent_id', $this->selectedSubcategory)->get()
            : collect(),
        'category' => $categoryObj,
        'subcategory' => $subcategoryObj,
        'subsubcategory' => $subsubcategoryObj,
    ]);
}


}
