<?php

namespace App\Livewire\Tickets;

use App\Models\Ticket;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.public', ['title' => 'Ticket recibido'])]
class Thanks extends Component
{
    public int $ticketId;

    public function mount(int $id): void
    {
        $this->ticketId = $id;
    }

    public function render()
    {
        $ticket = Ticket::find($this->ticketId);
        return view('livewire.tickets.thanks', [
            'ticket' => $ticket,
        ]);
    }
}
