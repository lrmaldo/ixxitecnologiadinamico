<?php

namespace App\Livewire\Admin\Services;

use App\Models\Service;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public ?Service $service = null;

    #[Validate('required|string|min:3')]
    public string $title = '';

    #[Validate('nullable|string')]
    public ?string $summary = '';

    #[Validate('nullable|string')]
    public ?string $description = '';

    public ?string $icon = '';
    public ?string $image_path = '';
    #[Validate('nullable|image|max:6144')]
    public $image_file = null;

    public ?string $banner_image_path = '';
    #[Validate('nullable|image|max:6144')]
    public $banner_image_file = null;

    public bool $is_active = true;
    public ?string $seo_title = '';
    public ?string $seo_description = '';

    public function mount(?int $id = null): void
    {
        if ($id) {
            $this->service = Service::findOrFail($id);
            $this->fill($this->service->only(['title','summary','description','icon','image_path','banner_image_path','is_active','seo_title','seo_description']));
        }
    }

    public function save(): void
    {
        $data = $this->validate();

        if ($this->image_file) {
            $stored = $this->image_file->store('services', 'public');
            $data['image_path'] = $stored;
        }

        if ($this->banner_image_file) {
            $stored = $this->banner_image_file->store('services/banners', 'public');
            $data['banner_image_path'] = $stored;
        }

        $creating = !$this->service;
        if ($this->service) {
            $this->service->update($data);
        } else {
            $this->service = Service::create($data);
        }
        $this->dispatch($creating ? 'service-created' : 'service-updated');
        session()->flash('status', 'Servicio guardado');
        $this->redirectRoute('admin.services');
    }

    public function render()
    {
        return view('livewire.admin.services.edit')
            ->layout('components.layouts.app', [
                'title' => ($this->service ? 'Editar' : 'Nuevo') . ' servicio'
            ]);
    }
}
