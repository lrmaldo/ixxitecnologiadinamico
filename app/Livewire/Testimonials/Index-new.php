<?php

namespace App\Livewire\Testimonials;

use App\Models\Testimonial;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 9;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 9],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $testimonials = Testimonial::query()
            ->when($this->search, function($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('company', 'like', '%' . $this->search . '%')
                    ->orWhere('content', 'like', '%' . $this->search . '%');
            })
            ->orderBy('rating', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.testimonials.index', [
            'testimonials' => $testimonials
        ])->layout('layouts.app');
    }
}
