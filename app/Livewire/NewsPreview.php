<?php

namespace App\Livewire;

use App\Models\NewsArticle;
use App\Models\User;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Gate;

class NewsPreview extends NewsDetails
{
    public function mount(string $slug): void
    {
        $this->authorizeAdmin();
        $this->article = NewsArticle::where('slug', $slug)->firstOrFail();
        Gate::authorize('view', $this->article);
    }

    public function render()
    {
        $this->authorizeAdmin();
        Gate::authorize('view', $this->article);

        return view('livewire.news-details', ['isPreview' => true, ...$this->articleNavigation()]);
    }

    private function authorizeAdmin(): void
    {
        $user = auth('web')->user();
        abort_unless($user instanceof User && $user->canAccessPanel(Filament::getPanel('admin')), 403);
    }
}
