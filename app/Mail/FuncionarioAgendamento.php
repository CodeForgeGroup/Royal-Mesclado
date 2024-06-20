<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FuncionarioAgendamento extends Mailable
{
    use Queueable, SerializesModels;

    public $dadosAgendamento;

    public function __construct($dadosAgendamento)
    {
        $this->dadosAgendamento = $dadosAgendamento;
    }

    public function build()
    {
        return $this->subject('Novo Agendamento Recebido')
                    ->view('emails.agendamentoFuncionario');
    }
    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Novo Agendamento Recebido',
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
