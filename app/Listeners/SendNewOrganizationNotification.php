<?php

namespace App\Listeners;

use App\Events\NewOrganizationCreated;
use App\Notifications\NewOrganizationNotification;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendNewOrganizationNotification {
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(NewOrganizationCreated $event)
    {
        $admin_users = User::whereHas('roles', function ($query) {
            $query->where('role_id', 1);
        })->get();

        Notification::send($admin_users, new NewOrganizationNotification($event->organization));
    }
}
