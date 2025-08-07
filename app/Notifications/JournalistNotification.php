<?php

namespace App\Notifications;

use App\Models\Journalist;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class JournalistNotification extends Notification
{
    use Queueable;
    protected $journalist;

    /**
     * Create a new notification instance.
     */
    public function __construct(Journalist $journalist)
    {
        $this->journalist = $journalist;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'id'=>$this->journalist->id,
            'title'=>'New Journalist',
            'content'=>'A new journalist has been added',
        ];
    }
}
