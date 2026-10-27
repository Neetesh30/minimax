<?php

namespace App\Livewire;


use App\Models\NewsArticle;
use Livewire\Component;
use Livewire\WithPagination;


class News extends Component
{
    // public function render()
    // {
    //     return view('livewire.news');
    // }

    use WithPagination;

    public function render()
    {
        return view('livewire.news', [
            'articles' => NewsArticle::published()
                ->orderByDesc('published_at')
                ->orderByDesc('id')
                ->paginate(9),
        ]);
    }
}
