<?php

namespace App\Livewire;

use Stephenjude\FilamentBlog\Models\Post;
use Stephenjude\FilamentBlog\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ShowBlog extends Component
{
    use WithPagination;

    public $selectedCategory = null;

    public function filterByCategory($slug)
    {
        $this->selectedCategory = $slug;
        $this->resetPage(); // reset pagination when filtering
    }

    public function render()
    {
        $posts = Post::published()
            ->with(['author', 'category'])
            ->when($this->selectedCategory, function ($query) {
                $query->whereHas('category', function ($q) {
                    $q->where('slug', $this->selectedCategory);
                });
            })
            ->latest()
            ->paginate(6);

        return view('livewire.show-blog', [
            'posts'      => $posts,
            'categories' => Category::where('is_visible', true)->get(),
            'activeCategory' => $this->selectedCategory,
        ]);
    }
}
