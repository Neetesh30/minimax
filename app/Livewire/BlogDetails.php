<?php

namespace App\Livewire;

use Livewire\Component;
use Stephenjude\FilamentBlog\Models\Post;
use App\Services\SeoManager;
use Illuminate\Support\Collection;
class BlogDetails extends Component
{
    public $slug;
    public $post;
    public $relatedPosts;


    public function mount($slug)
    {
        $this->slug = $slug;

        $this->post = Post::with(['author', 'category'])
            ->where('slug', $this->slug)
            ->published()
            ->firstOrFail();

         // Fetch related posts (same category)
        $this->relatedPosts = Post::with('category')
            ->published()
            ->where('id', '!=', $this->post->id)
            // ->where('blog_category_id', $this->post->category_id)
            ->latest()
            ->take(4)
            ->get();
    }

    public function render()
    {
        return view('livewire.blog-details', [
            'post' => $this->post,
            'relatedPosts' => $this->relatedPosts,
            'seo' => SeoManager::resolve($this->post),
        ]);
    }
}
