<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ClienteAgendamento extends Mailable
{
    use Queueable, SerializesModels;

    public $dadosAgendamentoCliente;

    public function __construct($dadosAgendamentoCliente)
    {
        $this->dadosAgendamentoCliente = $dadosAgendamentoCliente;
    }

    public function build()
    {
        return $this->subject('Novo Agendamento Recebido')
                    ->view('emails.agendamentoCliente');
    }


    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Informações sobre seu agendamento',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
