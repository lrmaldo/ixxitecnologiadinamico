<?php

namespace App\Livewire\Admin\Gallery;

use App\Models\GalleryItem;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public ?GalleryItem $item = null;

    public ?string $title = null;
    public ?string $image_path = null;
    public $file = null;
    public ?string $description = null;
    public int $position = 0;
    public bool $is_active = true;

    protected $rules = [
        'title' => 'required|string|max:255',
        'image_path' => 'nullable|string',
        'file' => 'nullable|image|max:4096',
        'description' => 'nullable|string',
        'position' => 'nullable|integer',
        'is_active' => 'boolean',
    ];

    protected $validationAttributes = [
        'title' => 'título',
        'description' => 'descripción',
        'file' => 'imagen',
    ];

    public function mount(?int $id = null): void
    {
        if ($id) {
            $this->item = GalleryItem::findOrFail($id);
            // fill properties explicitly to ensure they are bound to the form
            $this->title = $this->item->title;
            $this->image_path = $this->item->image_path;
            $this->description = $this->item->description;
            $this->position = $this->item->position ?? 0;
            $this->is_active = (bool) $this->item->is_active;
        }
    }

    public function save(): void
    {
        $data = $this->validate();

        // Handle uploaded file if present
        if ($this->file) {
            $stored = $this->file->store('gallery', 'public');
            $data['image_path'] = $stored;
        } elseif (!$this->item && !$this->image_path) {
            // Si es nueva imagen y no hay archivo ni ruta manual, error
            $this->addError('file', 'Debes subir una imagen o proporcionar una ruta.');
            return;
        }

        // Ensure boolean cast
        $data['is_active'] = isset($data['is_active']) ? (bool) $data['is_active'] : (bool) $this->is_active;

        if ($this->item) {
            // Si estamos editando y no hay nuevo archivo, mantener la ruta existente
            if (!$this->file && !$data['image_path']) {
                $data['image_path'] = $this->item->image_path;
            }
            $this->item->update($data);
        } else {
            // Nueva imagen
            $this->item = GalleryItem::create($data + ['position' => $this->position]);
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
