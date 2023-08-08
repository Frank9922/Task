<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class TareaAsignada extends Mailable
{
    use Queueable, SerializesModels;


    public function __construct(public $name, )
    {

    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Tarea Asignada',
            from: new Address('no-reply@task.test', env('MAIL_FROM_NAME'))
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'TareaAsignada',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
