<?php

namespace App\Providers;

use App\Providers\NotificationEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreUserNotificationEvent
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NotificationEvent  $event
     * @return void
     */
    public function handle(NotificationEvent $event)
    {
        //
    }
}
