<?php

namespace App\Livewire\Testimonials;

use App\Models\Testimonial;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.public', ['title' => 'Testimonios - IXXI Tecnología'])]
class Index extends Component
{
    use WithPagination;

    public string $q = '';
    public int $selectedRating = 0;

    public function updatingQ() { $this->resetPage(); }
    public function updatingSelectedRating() { $this->resetPage(); }

    public function render()
    {
        $testimonials = Testimonial::query()
            ->where('is_active', true)
            ->when($this->q, fn($q) => $q->where('content','like',"%{$this->q}%")->orWhere('author_name','like',"%{$this->q}%")->orWhere('company','like',"%{$this->q}%"))
            ->when($this->selectedRating > 0, fn($q) => $q->where('rating', $this->selectedRating))
            ->latest()
            ->paginate(12);

        $stats = [
            'total' => Testimonial::where('is_active', true)->count(),
            'average_rating' => round(Testimonial::where('is_active', true)->avg('rating'), 1),
            'five_star_count' => Testimonial::where('is_active', true)->where('rating', 5)->count(),
        ];

        return view('livewire.testimonials.index', compact('testimonials', 'stats'));
    }
}
