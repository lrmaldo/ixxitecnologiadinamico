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
    \Log::info('ContactForm: submit start');

        $data = $this->validate();
        $data['source'] = 'landing';

    \Log::debug('ContactForm: validated');

        // Guardar en la base de datos
        try {
            ContactSubmission::create($data);
            \Log::debug('ContactForm: saved');
        } catch (\Exception $e) {
            \Log::error('❌ ContactForm: Error guardando en BD: ' . $e->getMessage());
        }

        // Enviar correo de notificación
        try {
            \Log::debug('ContactForm: sending mail');

            Mail::send(new ContactFormMail(
                customerName: $this->name,
                customerEmail: $this->email,
                customerPhone: $this->phone,
                customerMessage: $this->message,
                source: 'landing'
            ));

            \Log::debug('ContactForm: mail ok');

        } catch (\Exception $e) {
            // Log del error pero no interrumpir el flujo
            \Log::error('❌ ContactForm: Error enviando correo: ' . $e->getMessage());
            \Log::error('❌ ContactForm: Stack trace: ' . $e->getTraceAsString());
        }

        $this->reset(['name', 'email', 'phone', 'message']);
        $this->submitted = true;

    \Log::info('ContactForm: submit done');

        // Agregar más debug para el dispatch
        try {
            $this->dispatch('notify', title: 'Enviado', body: 'Gracias, te contactaremos en breve.');
            \Log::debug('ContactForm: notify dispatched');
        } catch (\Exception $e) {
            \Log::error('❌ ContactForm: Error despachando evento notify: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
