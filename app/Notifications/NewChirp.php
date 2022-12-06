<?php declare(strict_types=1);

namespace App\Notifications;

use App\Models\Chirp;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewChirp extends Notification
{
    use Queueable;

    public function __construct(public Chirp $chirp)
    {
    }

    public function toMail(): MailMessage
    {
        return (new MailMessage)
            ->subject("New Chirp from {$this->chirp->user->name}")
            ->greeting("New Chirp from {$this->chirp->user->name}")
            ->line(Str::limit($this->chirp->message, 50))
            ->action('Go to Chirper', url('/'))
            ->line('Thank you for using our application!');
    }
}
