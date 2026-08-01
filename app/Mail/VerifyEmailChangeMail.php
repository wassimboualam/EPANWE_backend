<?php

namespace App\Mail;

use Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerifyEmailChangeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $newEmail = "";
    public $link = "http://localhost:5173/dashboard/emailchange/";
    public $user;

    /**
     * Create a new message instance.
     */
    public function __construct($newEmail)
    {
        $this->newEmail = $newEmail;
        $this->user = Auth::user();
        $this->link .= $this->user->id;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Attempte to change email!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.verify',
            with: [
                "newEmail" => $this->newEmail,
                "user" => Auth::user(),
                "verificationUrl" => $this->link
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
