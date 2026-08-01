<?php

namespace App\Mail;

use Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordRefreshedMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $password = "";
    
    public string $frontendOrigin = "http://localhost:5173";
    public string $loginPath = "/login";

    /**
     * Create a new message instance.
     */
    public function __construct(string $password)
    {
        $this->password = $password;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Password Refreshed!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.refreshedpassword',
            with: [
                "password" => $this->password,
                "user" => Auth::user(),
                "loginUrl" => $this->frontendOrigin . $this->loginPath
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
