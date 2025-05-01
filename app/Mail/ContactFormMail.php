<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Message;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $lastname;
    public $email;
    public $affair;
    public $mensaje;
    /**
     * Create a new message instance.
     */
    public function __construct($name, $lastname, $email, $affair, $mensaje)
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->affair = $affair;
        $this->mensaje = $mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact')
                    ->subject('Nuevo mensaje de contacto')
                    ->replyTo($this->email);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Form Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
