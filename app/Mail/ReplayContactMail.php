<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReplayContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $replayMessage,$subject,$clientName;

    public function __construct($replayMessage, $subject, $clientName)
    {
        $this->replayMessage = $replayMessage;
        $this->subject = $subject;
        $this->clientName = $clientName;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'email.replay-contact',
            with: [
                'replayMessage' => $this->replayMessage,
                'clientName' => $this->clientName
            ]
        );
    }


    public function attachments(): array
    {
        return [];
    }
}
