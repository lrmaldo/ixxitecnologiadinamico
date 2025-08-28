<?php

namespace App\Livewire\Admin\Services;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public ?int $deleteId = null; // ID pendiente de confirmación
    public bool $showDeleteModal = false; // control modal
    public string $search = '';
    public string $status = ''; // '1' activos, '0' inactivos
    public int $perPage = 10;
    public string $sortField = 'id';
    public string $sortDirection = 'desc';

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
        'page'   => ['except' => 1],
        'perPage'=> ['except' => 10],
    'sortField' => ['except' => 'id'],
    'sortDirection' => ['except' => 'desc'],
    ];

    protected $listeners = [
        'service-updated' => '$refresh',
        'service-created' => '$refresh',
    ];

    public function updatingSearch(): void { $this->resetPage(); }
    public function updatingStatus(): void { $this->resetPage(); }
    public function updatingPerPage(): void { $this->resetPage(); }
    public function updatingSortField(): void { $this->resetPage(); }
    public function updatingSortDirection(): void { $this->resetPage(); }

    public function sortBy(string $field): void
    {
        // Campos permitidos para evitar inyección
        $allowed = ['id','title','is_active','created_at'];
        if (! in_array($field, $allowed, true)) {
            return;
        }
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = $field === 'id' ? 'desc' : 'asc'; // convención
        }
        $this->resetPage();
    }

    public function confirmDelete(int $id): void
    {
        $this->deleteId = $id;
        $this->showDeleteModal = true;
    }

    public function deleteConfirmed(): void
    {
        if ($this->deleteId) {
            Service::findOrFail($this->deleteId)->delete();
            $this->dispatch('notify', type: 'success', message: 'Servicio eliminado');
        }
        $this->reset(['deleteId', 'showDeleteModal']);
    }

    public function cancelDelete(): void
    {
        $this->reset(['deleteId', 'showDeleteModal']);
    }

    public function render()
    {
        $query = Service::query()
            ->select(['id','title','is_active','created_at'])
            ->when($this->search !== '', function ($q) {
                $s = '%' . str_replace(['%','_'], ['\\%','\\_'], $this->search) . '%';
                $q->where('title', 'like', $s);
            })
            ->when($this->status !== '', function ($q) {
                $q->where('is_active', (int)$this->status);
            });

        // Validar sortField nuevamente (defensa en profundidad)
        $allowed = ['id','title','is_active','created_at'];
        if (! in_array($this->sortField, $allowed, true)) {
            $this->sortField = 'id';
        }
        $direction = strtolower($this->sortDirection) === 'asc' ? 'asc' : 'desc';
        $query->orderBy($this->sortField, $direction)->orderBy('id','desc'); // orden secundario estable

        $services = $query->paginate($this->perPage);
        // Evitar N+1 y carga pesada (no relaciones aquí, columnas específicas ya seleccionadas)
        return view('livewire.admin.services.index', [
            'services' => $services,
        ])->layout('components.layouts.app', ['title' => 'Servicios']);
    }

}
