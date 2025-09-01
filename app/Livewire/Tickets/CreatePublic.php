<?php

namespace App\Livewire\Tickets;

use App\Enums\TicketPriority;
use App\Enums\TicketStatus;
use App\Models\Cliente;
use App\Models\Ticket;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('components.layouts.public', ['title' => 'Soporte - Nuevo Ticket'])]
class CreatePublic extends Component
{
    #[Validate('required|string|min:3|max:120')]
    public string $nombre = '';

    #[Validate('required|email|max:180')]
    public string $email = '';

    #[Validate('nullable|string|max:40')]
    public string $telefono = '';

    #[Validate('required|string|min:5|max:140')]
    public string $titulo = '';

    #[Validate('required|string|min:10')]
    public string $descripcion = '';

    #[Validate('required|in:baja,media,alta')]
    public string $prioridad = 'media';

    public bool $sent = false;

    // Honeypot simple
    public string $extra_field = '';
    public string $session_token = '';
    // Campo eliminado (sin reCAPTCHA ahora)
    // public string $recaptcha_token = '';

    public function mount(): void
    {
        $this->session_token = Str::random(32);
    }

    public function save()
    {
        try {
            // Anti-spam honeypot
            if ($this->extra_field !== '') {
                return; // bot
            }

            // Validamos los campos
            $validated = $this->validate();

            // Creamos o actualizamos cliente
            $cliente = Cliente::firstOrCreate(
            ['email' => $this->email],
            ['nombre' => $this->nombre, 'telefono' => $this->telefono ?: null]
        );

        $cliente->update([
            'nombre' => $this->nombre,
            'telefono' => $this->telefono ?: null,
        ]);

        $ticket = Ticket::create([
            'cliente_id' => $cliente->id,
            'empleado_id' => auth()->id() ?? 1,
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'estado' => TicketStatus::Abierto,
            'prioridad' => TicketPriority::from($this->prioridad),
        ]);

        // Enviar correo confirmación (simple)

        // Almacenar el ID del ticket en la sesión
        session()->flash('ticket_id', $ticket->id);

        // Usar redirección con navegación completa (no SPA)
        return redirect()->route('support.ticket.thanks', ['id' => $ticket->id]);

        } catch (\Exception $e) {
            // Capturar y mostrar cualquier error
            session()->flash('error', 'Error al guardar el ticket: ' . $e->getMessage());
            return null;
        }
    }

    public function render()
    {
        return view('livewire.tickets.create-public');
    }
}
