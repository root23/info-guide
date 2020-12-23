<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class NewOrganizationNotification extends Notification {
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($organization)
    {
        $this->organization = $organization;
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
        $message = 'Организация <b>' . $this->organization->title . '</b> (<a href="/admin/organizations/organization/' . $this->organization->id . '/edit">Перейти</a>) была зарегистрирована.';
        return [
            'id' => $this->organization->id,
            'message' => $message,
        ];
    }

    public function toBroadcast($notifiable) {
        $message = 'Организация <b>' . $this->organization->title . '</b> (<a href="/admin/organizations/organization/' . $this->organization->id . '/edit">Перейти</a>) была зарегистрирована.';
        return new BroadcastMessage([
            'id' => $this->organization->id,
            'message' => $message,
            'created_at' => $this->organization->created_at,
        ]);
    }
}
