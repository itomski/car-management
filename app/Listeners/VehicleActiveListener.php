<?php

namespace App\Listeners;

use App\Events\VehicleActive;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class VehicleActiveListener
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
     * @param  VehicleActive  $event
     * @return void
     */
    public function handle(VehicleActive $event)
    {
        dump($event);
    }
}
