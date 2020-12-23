<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class NewUserNotification extends Notification {
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $message = 'Пользователь <b>' . $this->user->name . '</b> (' . $this->user->email . ') был зарегистрирован.';
        return [
            'id' => $this->user->id,
            'message' => $message,
        ];
    }

    public function toBroadcast($notifiable) {
        $message = 'Пользователь <b>' . $this->user->name . '</b> (' . $this->user->email . ') был зарегистрирован.';
        return new BroadcastMessage([
            'id' => $this->user->id,
            'message' => $message,
        ]);
    }
}
