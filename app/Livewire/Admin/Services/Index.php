<?php

namespace App\Livewire\Admin\Services;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public array $selected = [];

    public function delete(int $id): void
    {
        Service::findOrFail($id)->delete();
    }

    public function render()
    {
        $services = Service::latest()->paginate(10);
        return view('livewire.admin.services.index', compact('services'))
            ->layout('components.layouts.app', ['title' => 'Servicios']);
    }

    public function exportSelected()
    {
        if (empty($this->selected)) {
            return;
        }
        $ids = implode(',', $this->selected);
        return redirect()->route('export.services.pdf', ['ids' => $ids]);
    }
}
