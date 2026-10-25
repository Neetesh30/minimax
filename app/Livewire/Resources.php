<?php


namespace App\Livewire;

use Livewire\Component;
use App\Models\ResourceCategory;

class Resources extends Component
{
    public array $pdfData = [];
    public $categories;

    public function mount()
    {
        $this->categories = ResourceCategory::where('is_active', true)
            ->with('pdfs')
            ->orderBy('order')
            ->get();

        $this->pdfData = $this->categories->mapWithKeys(fn ($cat) => [
            $cat->slug => $cat->pdfs->map(fn ($pdf) => [
                'name' => $pdf->title,
                'src'  => asset('storage/' . $pdf->file),
            ])->values()
        ])->toArray();
    }

    public function render()
    {
        return view('livewire.resources', [
        'categories' => ResourceCategory::all(),
       ]);
    }
}
