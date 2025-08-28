<?php

namespace App\Livewire\Admin\Testimonials;

use App\Models\Testimonial;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public string $search = '';
    public string $active = '';// 1/0
    public int $perPage = 10;
    public string $sortField = 'id';
    public string $sortDirection = 'desc';
    public ?int $deleteId = null;
    public bool $showDeleteModal = false;

    protected $queryString = [
        'search' => ['except' => ''],
        'active' => ['except' => ''],
        'perPage' => ['except' => 10],
        'page' => ['except' => 1],
        'sortField' => ['except' => 'id'],
        'sortDirection' => ['except' => 'desc'],
    ];

    protected $listeners = [
        'testimonial-created' => '$refresh',
        'testimonial-updated' => '$refresh',
    ];

    public function updatingSearch(){ $this->resetPage(); }
    public function updatingActive(){ $this->resetPage(); }
    public function updatingPerPage(){ $this->resetPage(); }
    public function updatingSortField(){ $this->resetPage(); }
    public function updatingSortDirection(){ $this->resetPage(); }

    public function sortBy(string $field): void
    {
        $allowed = ['id','author_name','author_role','company','is_active','rating','created_at'];
        if(!in_array($field,$allowed,true)) return;
        if($this->sortField === $field){
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field; $this->sortDirection = $field === 'id' ? 'desc' : 'asc';
        }
    }

    public function delete(int $id): void
    {
        Testimonial::findOrFail($id)->delete();
        $this->dispatch('notify', type: 'success', message: 'Testimonio eliminado');
    }

    public function confirmDelete(int $id): void
    {
        $this->deleteId = $id;
        $this->showDeleteModal = true;
    }

    public function deleteConfirmed(): void
    {
        if($this->deleteId){
            $this->delete($this->deleteId);
        }
        $this->reset(['deleteId','showDeleteModal']);
    }

    public function cancelDelete(): void
    {
        $this->reset(['deleteId','showDeleteModal']);
    }

    public function render()
    {
        $query = Testimonial::query()->select(['id','author_name','author_role','company','content','rating','is_active','created_at']);
        if($this->search !== ''){
            $s = '%' . str_replace(['%','_'], ['\\%','\\_'], $this->search) . '%';
            $query->where(function($q) use ($s){
                $q->where('author_name','like',$s)->orWhere('company','like',$s)->orWhere('author_role','like',$s);
            });
        }
        if($this->active !== ''){
            $query->where('is_active',(int)$this->active);
        }
        $allowed = ['id','author_name','author_role','company','is_active','rating','created_at'];
        if(!in_array($this->sortField,$allowed,true)) $this->sortField = 'id';
        $direction = strtolower($this->sortDirection) === 'asc' ? 'asc' : 'desc';
        $query->orderBy($this->sortField,$direction)->orderBy('id','desc');
        $testimonials = $query->paginate($this->perPage);
        return view('livewire.admin.testimonials.index', compact('testimonials'))
            ->layout('components.layouts.app', ['title' => 'Testimonios']);
    }
}
