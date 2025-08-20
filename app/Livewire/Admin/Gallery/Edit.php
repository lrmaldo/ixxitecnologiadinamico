<?php

namespace App\Livewire\Admin\Gallery;

use App\Models\GalleryItem;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public ?GalleryItem $item = null;

    public ?string $title = '';
    #[Validate('nullable|string')]
    public string $image_path = '';
    #[Validate('nullable|image|max:4096')]
    public $file = null;
    public ?string $description = '';
    public int $position = 0;
    public bool $is_active = true;

    public function mount(?int $id = null): void
    {
        if ($id) {
            $this->item = GalleryItem::findOrFail($id);
            $this->fill($this->item->only(['title','image_path','description','position','is_active']));
        }
    }

    public function save(): void
    {
        $data = $this->validate();
        if ($this->file) {
            $stored = $this->file->store('gallery', 'public');
            $data['image_path'] = $stored;
        }
        if ($this->item) {
            $this->item->update($data);
        } else {
            $this->item = GalleryItem::create($data);
        }
    session()->flash('status', 'Imagen guardada');
        $this->redirectRoute('admin.gallery');
    }

    public function render()
    {
        $title = $this->item ? 'Editar imagen' : 'Nueva imagen';
        return view('livewire.admin.gallery.edit')
            ->layout('components.layouts.app', ['title' => $title]);
    }
}
