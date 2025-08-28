<?php

namespace App\Livewire\Admin\Testimonials;

use App\Models\Testimonial;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
    public ?Testimonial $testimonial = null;

    #[Validate('required|string|min:3')]
    public string $author_name = '';
    #[Validate('nullable|string|max:120')]
    public ?string $author_role = '';
    #[Validate('nullable|string|max:160')]
    public ?string $company = '';
    #[Validate('required|string|min:5')]
    public string $content = '';
    #[Validate('integer|min:1|max:5')]
    public int $rating = 5;
    #[Validate('boolean')]
    public bool $is_active = true;

    public function mount(?int $id = null): void
    {
        if ($id) {
            $this->testimonial = Testimonial::findOrFail($id);
            $this->fill($this->testimonial->only(['author_name','author_role','company','content','rating','is_active']));
        }
    }

    public function save(): void
    {
    $data = $this->validate(); // Ahora incluye author_role, company, rating, is_active
        if ($this->testimonial) {
            $this->testimonial->update($data);
        } else {
            $this->testimonial = Testimonial::create($data);
        }
    session()->flash('status', 'Testimonio guardado');
        $this->redirectRoute('admin.testimonials');
    }

    public function render()
    {
        $title = $this->testimonial ? 'Editar testimonio' : 'Nuevo testimonio';
        return view('livewire.admin.testimonials.edit')
            ->layout('components.layouts.app', ['title' => $title]);
    }
}
