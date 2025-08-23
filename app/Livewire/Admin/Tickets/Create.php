<?php

namespace App\Livewire\Admin\Tickets;

use App\Enums\TicketPriority;
use App\Enums\TicketStatus;
use App\Models\Cliente;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('components.layouts.app', ['title' => 'Nuevo Ticket'])]
class Create extends Component
{
    // Selector avanzado de cliente
    public string $clienteSearch = '';
    public array $clienteOptions = [];
    public bool $clienteOpen = false;

    // Creación rápida de cliente
    public bool $newClienteOpen = false;
    public string $newClienteNombre = '';
    public string $newClienteEmail = '';
    public string $newClienteTelefono = '';

    #[Validate('required|exists:clientes,id')]
    public $cliente_id = '';

    #[Validate('required|string|min:5|max:120')]
    public $titulo = '';

    #[Validate('required|string|min:10')]
    public $descripcion = '';

    #[Validate('required|in:baja,media,alta')]
    public $prioridad = 'media';

    public function save()
    {
        $this->validate();

        $ticket = Ticket::create([
            'cliente_id' => $this->cliente_id,
            'empleado_id' => Auth::id(),
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'estado' => TicketStatus::Abierto,
            'prioridad' => TicketPriority::from($this->prioridad),
        ]);

        session()->flash('success', 'Ticket creado correctamente');
        return redirect()->route('admin.tickets.show', $ticket->id);
    }

    public function updatedClienteSearch(): void
    {
        $term = trim($this->clienteSearch);
        if ($term === '') {
            $this->clienteOptions = [];
            return;
        }

        $this->clienteOptions = Cliente::query()
            ->where(function ($q) use ($term) {
                $q->where('nombre', 'like', "%{$term}%")
                  ->orWhere('email', 'like', "%{$term}%");
            })
            ->orderBy('nombre')
            ->limit(10)
            ->get(['id','nombre','email'])
            ->map(fn ($c) => [
                'id' => $c->id,
                'text' => $c->nombre,
                'sub' => $c->email,
            ])->all();
    }

    public function selectCliente(int $id): void
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return;
        }
        $this->cliente_id = (string)$cliente->id;
        $this->clienteSearch = $cliente->nombre;
        $this->clienteOptions = [];
        $this->clienteOpen = false;
    }

    public function createCliente(): void
    {
        $data = $this->validate([
            'newClienteNombre' => 'required|string|min:3|max:120',
            'newClienteEmail' => 'required|email|unique:clientes,email',
            'newClienteTelefono' => 'nullable|string|max:30',
        ]);

        $cliente = Cliente::create([
            'nombre' => $this->newClienteNombre,
            'email' => $this->newClienteEmail,
            'telefono' => $this->newClienteTelefono ?: null,
        ]);

        $this->cliente_id = (string)$cliente->id;
        $this->clienteSearch = $cliente->nombre;
        $this->clienteOptions = [];
        $this->clienteOpen = false;

        // Reset quick-create form
        $this->newClienteNombre = '';
        $this->newClienteEmail = '';
        $this->newClienteTelefono = '';
        $this->newClienteOpen = false;

        session()->flash('success', 'Cliente creado y seleccionado');
    }

    public function cancelNewCliente(): void
    {
        $this->newClienteOpen = false;
    }

    public function render()
    {
        return view('livewire.admin.tickets.create');
    }
}
