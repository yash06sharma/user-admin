<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ActiveMail extends Notification
{
    use Queueable;
    protected $UserActive;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($UserActive)
    {
        $this->UserActive = $UserActive;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->subject('User Status')
        ->from('tutuapp.center.dmn@gmail.com', 'Yash')
        ->greeting($this->UserActive['greeting'])
        ->line($this->UserActive['email'] . $this->UserActive['showText'])
        ->line('click the below link for approval!')
        ->action('Approve', url('/useractive',$this->UserActive['id']))
        ->line('Best regards!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
