<?php

namespace App\Livewire;

use App\Mail\ContactFormMail;
use App\Models\ContactSubmission;
use Illuminate\Support\Facades\Mail;
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

        // Guardar en la base de datos
        ContactSubmission::create($data);

        // Enviar correo de notificación
        try {
            Mail::send(new ContactFormMail(
                customerName: $this->name,
                customerEmail: $this->email,
                customerPhone: $this->phone,
                customerMessage: $this->message,
                source: 'landing'
            ));
        } catch (\Exception $e) {
            // Log del error pero no interrumpir el flujo
            \Log::error('Error enviando correo de contacto: ' . $e->getMessage());
        }

        $this->reset(['name', 'email', 'phone', 'message']);
        $this->submitted = true;
        $this->dispatch('notify', title: 'Enviado', body: 'Gracias, te contactaremos en breve.');
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
