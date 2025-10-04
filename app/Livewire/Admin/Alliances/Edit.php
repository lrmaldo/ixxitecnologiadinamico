<?php

namespace App\Livewire\Admin\Alliances;

use App\Models\Alliance;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public ?Alliance $alliance = null;

    public ?string $name = null;
    public ?string $logo_path = null;
    public $logo = null;
    public ?string $url = null;
    public ?string $description = null;
    public int $position = 0;
    public bool $is_active = true;

    protected $rules = [
        'name' => 'nullable|string|max:255',
        'logo_path' => 'nullable|string',
        'logo' => 'nullable|image|max:4096',
        'url' => 'nullable|url|max:500',
        'description' => 'nullable|string',
        'position' => 'nullable|integer',
        'is_active' => 'boolean',
    ];

    protected $validationAttributes = [
        'name' => 'nombre',
        'logo' => 'logo',
        'url' => 'URL',
        'description' => 'descripción',
    ];

    public function mount(?int $id = null): void
    {
        if ($id) {
            $this->alliance = Alliance::findOrFail($id);
            $this->name = $this->alliance->name;
            $this->logo_path = $this->alliance->logo_path;
            $this->url = $this->alliance->url;
            $this->description = $this->alliance->description;
            $this->position = $this->alliance->position ?? 0;
            $this->is_active = (bool) $this->alliance->is_active;
        }
    }

    public function save(): void
    {
        $data = $this->validate();

        // Handle uploaded file if present
        if ($this->logo) {
            $stored = $this->logo->store('alliances', 'public');
            $data['logo_path'] = $stored;
        }

        // Ensure boolean cast
        $data['is_active'] = isset($data['is_active']) ? (bool) $data['is_active'] : (bool) $this->is_active;

        if ($this->alliance) {
            $this->alliance->update($data);
        } else {
            $this->alliance = Alliance::create($data + ['position' => $this->position]);
        }

        session()->flash('status', 'Alianza guardada');
        $this->redirectRoute('admin.alliances.index');
    }

    public function render()
    {
        $title = $this->alliance ? 'Editar alianza' : 'Nueva alianza';
        return view('livewire.admin.alliances.edit')
            ->layout('components.layouts.app', ['title' => $title]);
    }
}
