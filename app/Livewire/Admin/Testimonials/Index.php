<?php

namespace App\Livewire\Admin\Testimonials;

use App\Models\Testimonial;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function delete(int $id): void
    {
        Testimonial::findOrFail($id)->delete();
    }

    public function render()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('livewire.admin.testimonials.index', compact('testimonials'))
            ->layout('components.layouts.app', ['title' => 'Testimonios']);
    }
}
