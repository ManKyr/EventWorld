<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendContactEmail extends Notification
{
    use Queueable;

    private $name;
    private $email;
    private $subject;
    private $message;

    public function __construct($name, $email, $subject, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)->subject($this->subject)->markdown('emails.contact', [
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message
        ]);
    }
}
