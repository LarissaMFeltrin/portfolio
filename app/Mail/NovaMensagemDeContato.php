<?php

declare(strict_types=1);

namespace App\Mail;

use App\Models\Mensagem;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class NovaMensagemDeContato extends Mailable
{
    public function __construct(public readonly Mensagem $mensagem) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            // Responder o aviso ja responde quem escreveu.
            replyTo: [new Address($this->mensagem->email, $this->mensagem->nome)],
            subject: __('site.contato.aviso_email.assunto', ['nome' => $this->mensagem->nome], 'pt_BR'),
        );
    }

    public function content(): Content
    {
        return new Content(text: 'emails.nova-mensagem');
    }
}
