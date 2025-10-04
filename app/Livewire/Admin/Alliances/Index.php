<?php

namespace App\Livewire\Admin\Alliances;

use App\Models\Alliance;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public string $search = '';
    public string $sortBy = 'position';
    public string $sortDirection = 'asc';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy(string $field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function delete(Alliance $alliance)
    {
        $alliance->delete();
        session()->flash('status', 'Alianza eliminada correctamente');
    }

    public function toggleActive(Alliance $alliance)
    {
        $alliance->update(['is_active' => !$alliance->is_active]);
        session()->flash('status', 'Estado actualizado');
    }

    public function render()
    {
        $alliances = Alliance::query()
            ->when($this->search, fn($q) => $q->where('name', 'like', "%{$this->search}%"))
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(15);

        return view('livewire.admin.alliances.index', compact('alliances'))
            ->layout('components.layouts.app', ['title' => 'Alianzas']);
    }
}
