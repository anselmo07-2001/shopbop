<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminSendOrderMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $shopbop_support_email;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $contact_email)
    {
        $this->data = $data;
        $this->shopbop_support_email = $contact_email;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->data["subject"],
            replyTo: $this->shopbop_support_email
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.order_status',
            with: [
                "body_message" => $this->data["message"],
                "subject" => $this->data["subject"]
            ]
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
