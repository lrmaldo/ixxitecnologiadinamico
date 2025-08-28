<?php

namespace App\Livewire\Admin\Gallery;

use App\Models\GalleryItem;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public string $search = '';
    public string $status = '';
    public string $sortField = 'created_at';
    public string $sortDirection = 'desc';
    public int $perPage = 12;
    public ?int $deleteId = null;
    public bool $showDeleteModal = false;
    public bool $reorderMode = false; // modo drag & drop
    public array $order = []; // ids en orden actual
    public array $selected = []; // ids seleccionados para bulk
    public bool $selectAll = false; // seleccionar página actual
    public bool $bulk = false; // bandera para modal bulk
    public array $pageIds = []; // ids de la página actual

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
        'sortField' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
        'perPage' => ['except' => 12],
    ];

    protected $listeners = ['refreshGallery' => '$refresh', 'syncOrder' => 'syncOrder'];

    public function updatingSearch() { $this->resetPage(); }
    public function updatingStatus() { $this->resetPage(); }
    public function updatingPerPage() { $this->resetPage(); }
    public function updatedSearch() { $this->clearSelection(); }
    public function updatedStatus() { $this->clearSelection(); }
    public function updatedPerPage() { $this->clearSelection(); }

    public function sortBy(string $field): void
    {
        if(! in_array($field, ['title','created_at','position','is_active'])) return;
        if($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
        $this->resetPage();
    }

    public function confirmDelete(int $id): void
    {
        $this->deleteId = $id;
        $this->showDeleteModal = true;
    $this->bulk = false;
    }

    public function cancelDelete(): void
    {
        $this->deleteId = null;
        $this->showDeleteModal = false;
    }

    public function delete(int $id): void
    {
        GalleryItem::findOrFail($id)->delete();
        $this->dispatch('notify', message: 'Imagen eliminada');
        $this->cancelDelete();
    }

    public function deleteConfirmed(): void
    {
        if($this->bulk) {
            if(!empty($this->selected)) {
                GalleryItem::whereIn('id', $this->selected)->delete();
                $count = count($this->selected);
                $this->dispatch('notify', message: "$count imágenes eliminadas");
                $this->clearSelection();
            }
            $this->cancelDelete();
        } else {
            if($this->deleteId) {
                $this->delete($this->deleteId);
            }
        }
    }

    public function confirmBulkDelete(): void
    {
        if(empty($this->selected)) return;
        $this->bulk = true;
        $this->showDeleteModal = true;
    }

    public function updatedSelectAll($value): void
    {
        if($value) {
            $this->selected = $this->pageIds;
        } else {
            $this->selected = [];
        }
    }

    public function toggleSelection(int $id): void
    {
        if(in_array($id, $this->selected)) {
            $this->selected = array_values(array_diff($this->selected, [$id]));
        } else {
            $this->selected[] = $id;
        }
    }

    public function clearSelection(): void
    {
        $this->selected = [];
        $this->selectAll = false;
    }

    public function toggleReorder(): void
    {
        $this->reorderMode = ! $this->reorderMode;
        if($this->reorderMode) {
            // forzar orden por posición para coherencia visual
            $this->sortField = 'position';
            $this->sortDirection = 'asc';
        }
    }

    public function syncOrder($payload): void
    {
        // Evento desde Alpine con array de ids
        if(isset($payload['order']) && is_array($payload['order'])) {
            $this->order = array_map('intval', $payload['order']);
        }
    }

    public function saveOrder(): void
    {
        if(!$this->reorderMode || empty($this->order)) return;
        \DB::transaction(function(){
            foreach($this->order as $idx => $id) {
                GalleryItem::where('id',$id)->update(['position' => $idx + 1]);
            }
        });
        $this->dispatch('notify', message: 'Orden actualizado');
        $this->reorderMode = false;
        // refrescar
        $this->resetPage();
    }

    public function render()
    {
        $query = GalleryItem::query()
            ->select(['id','title','image_path','description','is_active','position','created_at'])
            ->when($this->search, fn($q) => $q->where(function($qq){
                $qq->where('title','like','%'.$this->search.'%')
                   ->orWhere('description','like','%'.$this->search.'%');
            }))
            ->when($this->status !== '', fn($q) => $q->where('is_active', $this->status === '1'));

        if($this->reorderMode || $this->sortField === 'position') {
            $query->orderBy('position', 'asc')->orderBy('id','asc');
        } else {
            $query->orderBy($this->sortField, $this->sortDirection)
                  ->orderBy('id','desc');
        }

        $items = $query->paginate($this->perPage);
        $this->pageIds = $items->pluck('id')->toArray();
        // sincronizar selectAll si cambia la página
        if($this->selectAll) {
            $diff = array_diff($this->pageIds, $this->selected);
            if(!empty($diff)) {
                $this->selected = array_unique(array_merge($this->selected, $this->pageIds));
            }
        }
        return view('livewire.admin.gallery.index', compact('items'))
            ->layout('components.layouts.app', ['title' => 'Galería']);
    }
}
