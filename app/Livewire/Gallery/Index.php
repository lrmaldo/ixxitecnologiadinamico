<?php

namespace App\Livewire\Gallery;

use App\Models\GalleryItem;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.public', ['title' => 'Galería - IXXI TECNOLOGÍA'])]
class Index extends Component
{
    use WithPagination;

    public string $q = '';

    public function updatingQ() {
        $this->resetPage();
    }

    public function render()
    {
        $items = GalleryItem::query()
            ->where('is_active', true)
            ->when($this->q, fn($q) => $q->where('title','like',"%{$this->q}%"))
            ->orderBy('position')
            ->latest()
            ->paginate(12);

        return view('livewire.gallery.index', compact('items'));
    }
}
