<?php

namespace App\Livewire\Admin\Gallery;

use App\Models\GalleryItem;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function delete(int $id): void
    {
        GalleryItem::findOrFail($id)->delete();
    }

    public function render()
    {
        $items = GalleryItem::latest()->paginate(12);
        return view('livewire.admin.gallery.index', compact('items'))
            ->layout('components.layouts.app', ['title' => 'Galería']);
    }
}
