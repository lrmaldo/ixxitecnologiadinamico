<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use SerializesModels;

    public function __construct(
        public string $customerName,
        public ?string $customerEmail,
        public ?string $customerPhone,
        public ?string $customerMessage,
        public string $source = 'landing'
    ) {}

    public function envelope(): Envelope
    {
        // Obtener usuarios que reciben correos de contacto
        $ccRecipients = User::contactEmailRecipients()
            ->pluck('email')
            ->toArray();

        return new Envelope(
            to: 'contacto@ixxitecnologia.com',
            cc: $ccRecipients,
            subject: 'Nuevo mensaje de contacto - ' . $this->customerName,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-form',
            with: [
                'customerName' => $this->customerName,
                'customerEmail' => $this->customerEmail,
                'customerPhone' => $this->customerPhone,
                'customerMessage' => $this->customerMessage,
                'source' => $this->source,
            ]
        );
    }
}
