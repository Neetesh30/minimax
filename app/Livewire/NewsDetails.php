<?php

namespace App\Livewire;

use App\Models\NewsArticle;
use Livewire\Component;

class NewsDetails extends Component
{
    public NewsArticle $article;

    public function mount(string $slug): void
    {
        $this->article = NewsArticle::published()->where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.news-details', $this->articleNavigation());
    }

    protected function articleNavigation(): array
    {
        if (! $this->article->published_at) {
            return ['previousArticle' => null, 'nextArticle' => null];
        }

        $date = $this->article->published_at;
        $id = $this->article->id;

        $previous = NewsArticle::published()
            ->where(fn ($query) => $query->where('published_at', '<', $date)
                ->orWhere(fn ($query) => $query->where('published_at', $date)->where('id', '<', $id)))
            ->orderByDesc('published_at')->orderByDesc('id')->first();

        $next = NewsArticle::published()
            ->where(fn ($query) => $query->where('published_at', '>', $date)
                ->orWhere(fn ($query) => $query->where('published_at', $date)->where('id', '>', $id)))
            ->orderBy('published_at')->orderBy('id')->first();

        return ['previousArticle' => $previous, 'nextArticle' => $next];
    }
}
