<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentNotification extends Notification
{
    use Queueable;

    private $post_detail_url;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($post_detail_url)
    {
        $this->post_detail_url = $post_detail_url;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
            ->line(ucfirst(auth()->user()->name).' has commented on your post')
            ->action('Click to view Post', $this->post_detail_url)
            ->line('Thank you for using our application!');
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
            'notification_data' => [
                'name' => auth()->user()->name,
                'post_detail_url' => $this->post_detail_url

            ]
        ];
    }
}
