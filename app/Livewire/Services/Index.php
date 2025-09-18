<?php

namespace App\Livewire\Services;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
    $query = Service::publicList()->latest('published_at');

        // Aplicar filtro de búsqueda
        if ($this->search) {
            $query->where(function ($q) {
                                $q->where('title', 'like', '%' . $this->search . '%')
                                    ->orWhere('summary', 'like', '%' . $this->search . '%')
                                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        $services = $query->paginate(12);

        return view('livewire.services.index', compact('services'))
            ->layout('components.layouts.public')
            ->title('Nuestros Servicios | IXXI TECNOLOGÍA');
    }
}
