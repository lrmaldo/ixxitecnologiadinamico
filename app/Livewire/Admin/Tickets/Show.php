<?php

namespace App\Livewire\Admin\Tickets;

use App\Enums\TicketStatus;
use App\Mail\ClientUpdatedMail;
use App\Mail\TicketClosedMail;
use App\Models\ComentarioTicket;
use App\Models\Ticket;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('components.layouts.app')]
class Show extends Component
{
    public Ticket $ticket;

    #[Validate('required|string|min:2')]
    public $comentario = '';

    // Edición de cliente
    public bool $editCliente = false;
    public string $clienteNombre = '';
    public string $clienteEmail = '';
    public string $clienteTelefono = '';

    public function mount(int $id)
    {
        $this->ticket = Ticket::with(['cliente', 'empleado', 'comentarios.empleado'])->findOrFail($id);
        $this->hydrateClienteFields();
    }

    public function addComment()
    {
        $this->validateOnly('comentario');

        $c = $this->ticket->comentarios()->create([
            'empleado_id' => Auth::id(),
            'comentario' => $this->comentario,
        ]);

        $this->comentario = '';
        $this->ticket->refresh();
        session()->flash('success', 'Comentario agregado');
    }

    public function closeTicket()
    {
        if ($this->ticket->estado === TicketStatus::Cerrado) {
            return;
        }
        $this->ticket->estado = TicketStatus::Cerrado;
        $this->ticket->fecha_cierre = now();
        $this->ticket->save();
        // Notificar por email
        $mailable = new TicketClosedMail($this->ticket->load(['cliente','empleado']));
        $to = config('mail.from.address');
        if ($to) {
            $mailer = Mail::to($to);
            $cc = env('SUPPORT_NOTIFY');
            if ($cc) {
                $mailer->cc(array_map('trim', explode(',', $cc)));
            }
            $mailer->send($mailable);
        }
        $this->ticket->refresh();
        session()->flash('success', 'Ticket cerrado');
    }

    public function editClienteToggle(): void
    {
        $this->editCliente = !$this->editCliente;
        if ($this->editCliente) {
            $this->hydrateClienteFields();
        }
    }

    public function updateCliente(): void
    {
        $id = $this->ticket->cliente->id;
        $this->validate([
            'clienteNombre' => ['required','string','min:3','max:120'],
            'clienteEmail' => ['required','email', Rule::unique('clientes', 'email')->ignore($id)],
            'clienteTelefono' => ['nullable','string','max:30'],
        ]);

        $original = $this->ticket->cliente->only(['nombre','email','telefono']);

        $this->ticket->cliente->update([
            'nombre' => $this->clienteNombre,
            'email' => $this->clienteEmail,
            'telefono' => $this->clienteTelefono ?: null,
        ]);

        $updated = $this->ticket->cliente->only(['nombre','email','telefono']);
        $diffs = [];
        foreach (['nombre' => 'Nombre', 'email' => 'Email', 'telefono' => 'Teléfono'] as $key => $label) {
            $before = (string) ($original[$key] ?? '');
            $after = (string) ($updated[$key] ?? '');
            if ($before !== $after) {
                $beforeShown = $before === '' ? '—' : $before;
                $afterShown = $after === '' ? '—' : $after;
                $diffs[] = "$label: '" . $beforeShown . "' → '" . $afterShown . "'";
            }
        }

        if (!empty($diffs)) {
            $message = 'Cliente actualizado: ' . implode('; ', $diffs);
            $this->ticket->comentarios()->create([
                'empleado_id' => Auth::id(),
                'comentario' => $message,
            ]);

            // Notificar por email
            $mailable = new ClientUpdatedMail($this->ticket->load(['cliente','empleado']), $diffs);
            $to = config('mail.from.address');
            if ($to) {
                $mailer = Mail::to($to);
                $cc = env('SUPPORT_NOTIFY');
                if ($cc) {
                    $mailer->cc(array_map('trim', explode(',', $cc)));
                }
                $mailer->send($mailable);
            }
        }

        $this->ticket->refresh();
        $this->editCliente = false;
        session()->flash('success', 'Cliente actualizado');
    }

    private function hydrateClienteFields(): void
    {
        $c = $this->ticket->cliente;
        $this->clienteNombre = (string) $c->nombre;
        $this->clienteEmail = (string) $c->email;
        $this->clienteTelefono = (string) ($c->telefono ?? '');
    }

    public function render()
    {
        return view('livewire.admin.tickets.show');
    }
}
