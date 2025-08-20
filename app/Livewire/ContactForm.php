<?php

namespace App\Livewire;

use App\Models\ContactSubmission;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ContactForm extends Component
{
    #[Validate('required|string|min:3')]
    public string $name = '';

    #[Validate('nullable|email')]
    public ?string $email = '';

    #[Validate('nullable|string')]
    public ?string $phone = '';

    #[Validate('nullable|string|max:2000')]
    public ?string $message = '';

    public bool $submitted = false;

    public function submit(): void
    {
        $data = $this->validate();
        $data['source'] = 'landing';
        ContactSubmission::create($data);
        $this->reset(['name', 'email', 'phone', 'message']);
        $this->submitted = true;
        $this->dispatch('notify', title: 'Enviado', body: 'Gracias, te contactaremos en breve.');
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
