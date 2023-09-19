<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Attachment;


class Invitation extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $email;

    /**
     * Create a new message instance.
     */
    public function __construct($order, $email)
    {
        $this->order = $order;
        $this->email = $email;
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $user = ($this->order->name);
        return new Envelope(
            subject: 'Invitation From' . $user,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.invitation',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $imageUrl = ($this->order->image_src);
        $attachment = Attachment::fromPath(public_path($imageUrl));
        return [$attachment];
    }
}
