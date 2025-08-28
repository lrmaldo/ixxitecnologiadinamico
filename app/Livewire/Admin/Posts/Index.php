<?php

namespace App\Livewire\Admin\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public string $search = '';
    public string $type = '';
    public string $published = '';// '1' sí, '0' no
    public int $perPage = 10;
    public string $sortField = 'id';
    public string $sortDirection = 'desc';
    public ?int $deleteId = null;
    public bool $showDeleteModal = false;

    protected $queryString = [
        'search' => ['except' => ''],
        'type' => ['except' => ''],
        'published' => ['except' => ''],
        'page' => ['except' => 1],
        'perPage' => ['except' => 10],
        'sortField' => ['except' => 'id'],
        'sortDirection' => ['except' => 'desc'],
    ];

    protected $listeners = [
        'post-created' => '$refresh',
        'post-updated' => '$refresh',
    ];

    public function updatingSearch(){ $this->resetPage(); }
    public function updatingType(){ $this->resetPage(); }
    public function updatingPublished(){ $this->resetPage(); }
    public function updatingPerPage(){ $this->resetPage(); }
    public function updatingSortField(){ $this->resetPage(); }
    public function updatingSortDirection(){ $this->resetPage(); }

    public function sortBy(string $field): void
    {
        $allowed = ['id','title','type','is_published','created_at'];
        if(!in_array($field, $allowed, true)) return;
        if($this->sortField === $field){
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = $field === 'id' ? 'desc' : 'asc';
        }
    }

    public function delete(int $id): void
    {
        Post::findOrFail($id)->delete();
        $this->dispatch('notify', type: 'success', message: 'Publicación eliminada');
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
        $query = Post::query()->select(['id','title','type','is_published','created_at']);
        if($this->search !== ''){
            $s = '%' . str_replace(['%','_'], ['\\%','\\_'], $this->search) . '%';
            $query->where('title','like',$s);
        }
        if($this->type !== ''){
            $query->where('type',$this->type);
        }
        if($this->published !== ''){
            $query->where('is_published',(int)$this->published);
        }
        $allowed = ['id','title','type','is_published','created_at'];
        if(!in_array($this->sortField,$allowed,true)) $this->sortField = 'id';
        $direction = strtolower($this->sortDirection) === 'asc' ? 'asc' : 'desc';
        $query->orderBy($this->sortField,$direction)->orderBy('id','desc');

        $posts = $query->paginate($this->perPage);
        return view('livewire.admin.posts.index', compact('posts'))
            ->layout('components.layouts.app', ['title' => 'Publicaciones']);
    }
}
