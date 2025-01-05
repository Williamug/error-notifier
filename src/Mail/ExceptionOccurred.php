<?php

namespace Williamug\ErrorNotifier\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ExceptionOccurred extends Mailable
{
    use Queueable, SerializesModels;

    public $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Exception Occurred ['.now()->toDateTimeString().']'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'error-notifier::emails.exception',
            with: $this->content
        );
    }

    public function attachments(): array
    {
        return [
            //
        ];
    }
}
