<?php

namespace App\Mail;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClientUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @param array<int,string> $diffs
     */
    public function __construct(public Ticket $ticket, public array $diffs) {}

    public function build()
    {
        return $this->subject('Cliente actualizado en ticket: '.$this->ticket->titulo)
            ->view('emails.tickets.client_updated');
    }
}
