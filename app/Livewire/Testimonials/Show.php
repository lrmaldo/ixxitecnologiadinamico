<?php

namespace App\Livewire\Testimonials;

use App\Models\Testimonial;
use Livewire\Component;

class Show extends Component
{
    public Testimonial $testimonial;

    public function mount($id)
    {
        $this->testimonial = Testimonial::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.testimonials.show');
    }
}
