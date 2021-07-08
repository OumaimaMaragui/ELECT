<?php

namespace App\Listeners;

use App\Events\ActualiteEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ActualiteEventNotification
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
     * @param  ActualiteEvent  $event
     * @return void
     */
    public function handle(ActualiteEvent $event)
    {
        echo 'hiiiiiiiiii';
        dd($event);
    }
}
