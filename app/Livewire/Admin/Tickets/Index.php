<?php

namespace App\Livewire\Admin\Tickets;

use App\Enums\TicketPriority;
use App\Enums\TicketStatus;
use App\Models\Cliente;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.app', ['title' => 'Tickets'])]
class Index extends Component
{
    use WithPagination;

    public ?int $cliente = null;
    public ?string $estado = null;
    public ?string $prioridad = null;
    public string $q = '';

    // Nuevos controles UI
    public int $perPage = 10;
    public string $sortField = 'created_at';
    public string $sortDirection = 'desc';

    protected $queryString = [
        'cliente' => ['except' => ''],
        'estado' => ['except' => ''],
        'prioridad' => ['except' => ''],
        'q' => ['except' => ''],
        'sortField' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
        'perPage' => ['except' => 10],
    ];

    public function updating($field)
    {
        if (in_array($field, ['cliente', 'estado', 'prioridad', 'q'])) {
            $this->resetPage();
        }
    }

    public function sortBy(string $field): void
    {
        $allowed = ['created_at', 'titulo', 'prioridad', 'estado'];
        if (!in_array($field, $allowed)) {
            return;
        }
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
        $this->resetPage();
    }

    public function render()
    {
        $query = Ticket::query()
            ->with(['cliente', 'empleado'])
            ->when($this->cliente, fn (Builder $q) => $q->where('cliente_id', $this->cliente))
            ->when($this->estado, fn (Builder $q) => $q->where('estado', $this->estado))
            ->when($this->prioridad, fn (Builder $q) => $q->where('prioridad', $this->prioridad))
            ->when($this->q, function (Builder $q) {
                $q->where(function (Builder $sub) {
                    $sub->where('titulo', 'like', "%{$this->q}%")
                        ->orWhere('descripcion', 'like', "%{$this->q}%");
                });
            })
            ->orderBy($this->sortField, $this->sortDirection);

        $tickets = $query->paginate($this->perPage);
        $clientes = Cliente::orderBy('nombre')->get(['id', 'nombre']);

        return view('livewire.admin.tickets.index', [
            'tickets' => $tickets,
            'clientes' => $clientes,
            'estados' => [TicketStatus::Abierto->value, TicketStatus::EnProgreso->value, TicketStatus::Cerrado->value],
            'prioridades' => [TicketPriority::Baja->value, TicketPriority::Media->value, TicketPriority::Alta->value],
        ]);
    }
}
